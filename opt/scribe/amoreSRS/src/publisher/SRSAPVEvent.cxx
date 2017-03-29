#include "SRSAPVEvent.h"
#include <stdio.h>
#include <stdlib.h>
#include <sstream>
#include <iostream>

ClassImp(SRSAPVEvent);

//=====================================================
SRSAPVEvent::SRSAPVEvent(Int_t fec_no, Int_t fec_channel, Int_t apv_id, Int_t zeroSupCut, Int_t EventNb, Int_t packetSize) {
    Clear() ;
    SRSMapping * mapping = SRSMapping::GetInstance();
    
    fPlane        = "GEM1X" ;
    fDetector     = "GEM1" ;
    fReadoutBoard = "CARTESIAN" ;
    fDetectorType = "STANDARD" ;
    
    fPlaneSize       = 102.4 ;
    fAPVIndexOnPlane = 2;
    fAPVOrientation  = 0 ;
    fAPVstripmapping = 0 ;
    fAPVHeaderLevel  = 1300 ;
    fEtaSectorPos = 0 ;
    
    fTrapezoidDetOuterRadius = 430.0 ;
    fTrapezoidDetInnerRadius = 220.0 ;
    
    fPedSubFlag           = kFALSE ;
    fCommonModeFlag       = kFALSE ;
    fIsCosmicRunFlag      = kFALSE ;
    fIsPedestalRunFlag    = kFALSE ;
    fIsRawPedestalRunFlag = kFALSE ;
    
    fFECNo = fec_no ;
    fAPVID = apv_id ;
    
    fADCChannel = fec_channel ;
    fPacketSize = packetSize;
    
    fAPVGain = 1.0 ;
    
    fEventNb = EventNb ;
    fZeroSupCut = zeroSupCut ;
    fMeanAPVnoise = 0;
    
    fAPVKey          = mapping->GetAPVNoFromID(apv_id);
    fAPV             = mapping->GetAPVFromID(apv_id);
    fAPVHeaderLevel  = mapping->GetAPVHeaderLevelFromID(apv_id);
    fAPVIndexOnPlane = mapping->GetAPVIndexOnPlane(apv_id);
    fAPVOrientation  = mapping->GetAPVOrientation(apv_id);
    fAPVstripmapping = mapping->GetAPVstripmapping(apv_id);

    fPlane        = mapping->GetDetectorPlaneFromAPVID(apv_id);
    fDetector     = mapping->GetDetectorFromPlane(fPlane) ;
    fReadoutBoard = mapping->GetReadoutBoardFromDetector(fDetector) ;
    fDetectorType = mapping->GetDetectorTypeFromDetector(fDetector) ;
    
    
    if(fReadoutBoard == "CARTESIAN") {
        fPlaneSize         = (mapping->GetCartesianReadoutMap(fPlane))[1];
        fNbOfAPVsFromPlane = (Int_t) ((mapping->GetCartesianReadoutMap(fPlane)) [2]) ;
        fPadDetectorMap.resize(5) ;
        //    printf("SRSAPVEvent::SRSAPVEvent  detType=%s, plane=%s, planeSize=%f, fNbOfAPVsFromPlane=%d\n", fDetectorType.Data(), fPlane.Data(), fPlaneSize, fNbOfAPVsFromPlane) ;
    }
    
    if(fReadoutBoard == "UV_ANGLE") {
        fTrapezoidDetLength      = (mapping->GetUVangleReadoutMap(fDetector)) [0] ;
        fTrapezoidDetInnerRadius = (mapping->GetUVangleReadoutMap(fDetector)) [1] ;
        fTrapezoidDetOuterRadius = (mapping->GetUVangleReadoutMap(fDetector)) [2] ;
        fNbOfAPVsFromPlane = (Int_t) ((mapping->GetUVangleReadoutMap(fPlane)) [1]) ;
        fPadDetectorMap.resize(5) ;
        //    printf("SRSAPVEvent::SRSAPVEvent => fDetector =%s,  fPlane=%s, detLength=%f, innerRadius=%f, outerRadius=%f, fNbOfAPVsFromPlane=%d \n",fDetector.Data(), fPlane.Data(), fTrapezoidDetLength, fTrapezoidDetInnerRadius, fTrapezoidDetOuterRadius, fNbOfAPVsFromPlane);
    }
    
    if(fReadoutBoard == "1DSTRIPS") {
        fPlaneSize = (mapping->Get1DStripsReadoutMap(fPlane)) [1] ;
        fNbOfAPVsFromPlane = (Int_t) ((mapping->Get1DStripsReadoutMap(fPlane)) [2]) ;
        fPadDetectorMap.resize(5) ;
        //    printf("SRSAPVEvent::SRSAPVEvent  fPlane=%s, planeSize=%f, fNbOfAPVsFromPlane=%d \n", fPlane.Data(), fPlaneSize, fNbOfAPVsFromPlane);
    }
    
    if(fReadoutBoard == "CMSGEM") {
        fEtaSectorPos = (mapping->GetCMSGEMReadoutMap(fPlane)) [0] ;
        fPlaneSize    = (mapping->GetCMSGEMReadoutMap(fPlane)) [1] ;
        fNbOfAPVsFromPlane = (Int_t) ((mapping->GetCMSGEMReadoutMap(fPlane)) [2]) ;
        fPadDetectorMap.resize(5) ;
        //    printf("SRSAPVEvent::SRSAPVEvent   fPlane=%s, etaSectorPos=%f, planeSize=%f, fNbOfAPVsFromPlane=%d, \n", fPlane.Data(), fEtaSectorPos, fPlaneSize, fNbOfAPVsFromPlane);
    }
    
    else if(fReadoutBoard == "PADPLANE") {
        vector< Int_t> apvChPadCh = mapping->GetPadChannelsMapping(apv_id) ;
        vector< Int_t>::const_iterator apvChPadCh_itr ;
        for (apvChPadCh_itr = apvChPadCh.begin(); apvChPadCh_itr != apvChPadCh.end(); ++apvChPadCh_itr) {
            Int_t apvChPadCh = * apvChPadCh_itr ;
            Int_t padCh =  (apvChPadCh >> 8) & 0xffff ;
            Int_t apvCh = apvChPadCh & 0xff ;
            fapvChToPadChMap[apvCh] = padCh ;
            fPadDetectorMap = mapping->GetPadDetectorMap(fDetector) ;
            fPadDetectorMap.resize(5) ;
        }
    }
    //  printf("SRSAPVEvent::SRSAPVEvent   fPlane=%s, etaSectorPos=%f, planeSize=%f, fNbOfAPVsFromPlane=%d, \n", fPlane.Data(), fEtaSectorPos, fPlaneSize, fNbOfAPVsFromPlane) ;
}

//=====================================================
void SRSAPVEvent::Clear() {
    fRawData32bits.clear() ;
    fRawData16bits.clear() ;
    fapvTimeBinDataMap.clear() ;
    //fapvTimeBinDataMapAdc.clear() ;
    fPedestalData.clear() ;
    fRawPedestalData.clear() ;
    fMaskedChannels.clear() ;
    fPedestalNoises.clear() ;
    fRawPedestalNoises.clear() ;
    
    fCommonModeOffsets.clear() ;
    fCommonModeOffsets_odd.clear() ;
    fCommonModeOffsets_even.clear() ;
    fPadDetectorMap.clear() ;
    //  printf(" === SRSAPVEvent::Clear()\n") ;
}

//=====================================================
SRSAPVEvent::~SRSAPVEvent(){
    Clear() ;
}

//=====================================================

void SRSAPVEvent::Add32BitsRawData(UInt_t rawData32bits) {
    //  printf("SRSAPVEvent::Add32BitsRawData()\n");
    fRawData32bits.push_back(rawData32bits) ;
}

//=====================================================
void SRSAPVEvent::Set32BitsRawData(vector<UInt_t> rawData32bits) {
    //  printf("SRSAPVEvent::Set32BitsRawData()\n");
    fRawData32bits.clear() ;
    fRawData32bits = rawData32bits ;
}

//=====================================================
Int_t  SRSAPVEvent::APVchannelCorrection(Int_t chNo) {
    //Int_t c1 = chNo;
    chNo = (32 * (chNo%4)) + (8 * (Int_t)(chNo/4)) - (31 * (Int_t)(chNo/16)) ;
    //cout << c1 << "\t" << chNo << endl;
    return chNo ;
}


//=====================================================
Int_t SRSAPVEvent::NS2StripMapping(Int_t chNo) {
    if((chNo%2)==1){
        chNo=((chNo-1)/2)+64;
    }
    else{
        chNo=(chNo/2);
    }
    return chNo ;
}

//=====================================================
Int_t SRSAPVEvent::CMSStripMapping(Int_t chNo) {
    if((chNo%2)==1){
        chNo= 127-(chNo-1)/2;
    }
    else{
	chNo = chNo/2; //63 - (chNo/2);
    }
    return chNo ;
}
//=====================================================
Int_t SRSAPVEvent::CMSStripMapping1(Int_t chNo) {
    if((chNo%2)==1){
        chNo= 1;
    }
    else{
	chNo = 1;
    }
    return chNo ;
}
//=====================================================

//=====================================================
Int_t SRSAPVEvent::CMSStripMapping2(Int_t chNo) {
    chNo=2;
    return chNo ;
}
//=====================================================
Int_t SRSAPVEvent::CMSStripMapping3(Int_t chNo) {
    chNo=3;
    return chNo ;
}

//=====================================================
Int_t SRSAPVEvent::CMSStripMapping4(Int_t chNo) {
    chNo=4;
    return chNo ;
}


//=====================================================
Int_t SRSAPVEvent::MMStripMappingAPV1(Int_t chNo){
    if((chNo%2)==1){
        chNo=((chNo-1)/2) + 32;
    }
    else{
        chNo=(chNo/2);
        if (chNo < 32) chNo = 31 - chNo;
        else if (chNo > 37) chNo = 159 - chNo ;
        else chNo += 90;
    }
    return chNo;
}

//=====================================================
Int_t SRSAPVEvent::MMStripMappingAPV2(Int_t chNo){
    if((chNo%2)==1){
        chNo=((chNo-1)/2) + 27;
    }
    else{
        chNo=(chNo/2);
        if (chNo < 27) chNo = 26 - chNo;
        else if (chNo > 38) chNo = 154 - chNo;
        else chNo += 89;
    }
    return chNo;
}

//=====================================================
Int_t SRSAPVEvent::MMStripMappingAPV3(Int_t chNo){
    if((chNo%2)==1){
        chNo=((chNo-1)/2) + 26;
    }
    else{
        chNo=(chNo/2);
        if (chNo < 26) chNo = 25 - chNo;
        else if (chNo > 31) chNo = 153 - chNo;
        else chNo += 96;
    }
    return chNo;
}

//=====================================================
//Int_t SRSAPVEvent::PRadStripsMapping(Int_t chNo) {
//  Int_t chno = chNo / 2 ;
//  chNo = chNo /2 ;
//  if (chNo % 2 == 0) chNo = 31 + (chNo / 2) ;

//  if (chNo % 2 == 0) chNo = 31 + (chNo / 2) ;
//  else {
//    if (chNo < 64 ) chNo = 31 -  ( (chNo + 1) / 2) ;
//    else            chNo = 127 - ( (chNo - 65) / 2 ) ;
//  }
//  printf("SRSAPVEvent::PRadStripsMapping ==>  APVID=%d, chNo=%d, stripNo=%d, \n",fAPVID, chno, chNo) ;

//  return chNo ;
//}

//=====================================================
Int_t SRSAPVEvent::StandardMapping(Int_t chNo) {
    return chNo ;
}

//=====================================================
Int_t SRSAPVEvent::EICStripMapping(Int_t chNo) {
    if(chNo % 2 == 0) chNo = chNo / 2 ;
    else              chNo = 64 + (chNo - 1) / 2 ;
    return chNo ;
}

//=====================================================
Int_t SRSAPVEvent::HMSStripMapping(Int_t chNo) {
    if(chNo % 4 == 0)      chNo = chNo + 2 ;
    else if(chNo % 4 == 1) chNo = chNo - 1 ;
    else if(chNo % 4 == 2) chNo = chNo + 1 ;
    else if(chNo % 4 == 3) chNo = chNo - 2 ;
    else chNo = chNo ;
    return chNo ;
}

//=====================================================
Int_t SRSAPVEvent::StripMapping(Int_t chNo) {
    chNo = APVchannelCorrection(chNo) ;
    if (fDetectorType == "CMSGEM") {
        if (fAPVstripmapping==0) chNo = CMSStripMapping(chNo) ;
        if (fAPVstripmapping==1) chNo = CMSStripMapping1(chNo) ;
        if (fAPVstripmapping==2) chNo = CMSStripMapping2(chNo) ;
        if (fAPVstripmapping==3) chNo = CMSStripMapping3(chNo) ;
        if (fAPVstripmapping==4) chNo = CMSStripMapping4(chNo) ;
        //cout << "AA " << chNo << endl;
    }
    else if (fDetectorType == "ZIGZAG")    chNo = ZigZagStripMapping(chNo) ;
    else if (fDetectorType == "NS2")       chNo = NS2StripMapping(chNo) ;
    else if (fDetectorType == "EICPROTO1") chNo = EICStripMapping(chNo) ;
    else if (fDetectorType == "HMSGEM")    chNo = HMSStripMapping(chNo) ;
    //else if (fDetectorType == "PRADGEM")   chNo = PRadStripsMapping(chNo) ;
    else                                   chNo = StandardMapping(chNo) ;
    return chNo;
}

//========================================================================================================================
static Bool_t usingGreaterThan(Float_t u, Float_t v) {
    return u > v  ;
}

//=====================================================
void SRSAPVEvent::Print() {
    //  printf("SRSAPVEvent::Print() => Printing APV Data: -1 == No Data, -2 == Underflow, -3 == Overflow\n");
    Int_t Size = fRawData32bits.size() ;
    Int_t Capacity = fRawData32bits.capacity() ;
    Int_t MaxSize =  fRawData32bits.max_size() ;
    vector<UInt_t>::const_iterator rawdata_itr ;
    for (rawdata_itr = fRawData32bits.begin(); rawdata_itr != fRawData32bits.end(); ++rawdata_itr) {
        Int_t rawdata = * rawdata_itr ;
        printf("SRSAPVEvent::Print() ====> 32 bits raw data [0x%x]\n",rawdata) ;
    }
}

//=====================================================
void SRSAPVEvent::ComputeRawData16bits() {
    
    //printf("SRSAPVEvent::ComputeRawData()==> fRawData32bits.size() = %d \n",(Int_t) (fRawData32bits.size()) ) ;
    fRawData16bits.clear() ;
    vector<UInt_t>::const_iterator rawData_itr ;
    for (rawData_itr = fRawData32bits.begin(); rawData_itr != fRawData32bits.end(); ++rawData_itr) {
        UInt_t word32bit = * rawData_itr ;
        //cout << "Word32bit is = " << word32bit << endl;
        if (((word32bit >> 8) & 0xffffff) != 0x41505a) {
            UInt_t data1 = (word32bit>> 24) & 0xff ;
            UInt_t data2 = (word32bit >> 16) & 0xff ;
            UInt_t data3 = (word32bit >> 8)  & 0xff ;
            UInt_t data4 = word32bit  & 0xff ;
            fRawData16bits.push_back(((data2 << 8) | data1)) ;
            fRawData16bits.push_back(((data4 << 8) | data3)) ;
        }
    }
}

//=======THIS FUNCION IS BYPASSED====================================
void SRSAPVEvent::ComputeTimeBinCommonMode() {
    //printf("  SRSAPVEvent::ComputeTimeBinCommonMode()==>enter \n") ;
    
    Int_t idata = 0  ;
    list <SRSHit * > listOfHits ;
    TString plane = fPlane ;
    Int_t padNo = 0 ;
    vector<Float_t> timeBinADCs;
    timeBinADCs.clear();
    
    Bool_t startDataFlag = kFALSE ;
    
    fapvTimeBinDataMap.clear() ;
    UInt_t apvheaderlevel = (UInt_t)  fAPVHeaderLevel ;
    Int_t size = fRawData16bits.size() ;
    
    if (size != fPacketSize) {
        //printf("SRSAPVEvent::ComputeTimeBinCommonMode() XXXX ERROR XXXXX ==> Packet size %d different from expected %d, header=%d \n",size,fPacketSize, fAPVHeaderLevel ) ;
    }
    
    std::list<Float_t> commonModeOffset,  commonModeOffset_odd, commonModeOffset_even ;
    Float_t apvBaseline = 4096 - TMath::Mean(fPedestalOffsets.begin(), fPedestalOffsets.end()) ;
    
    
    while(idata < size) {
        //printf("    SRSAPVEvent::ComputeTimeBinCommonMode()  ==> idata=%d, apvBaseline=%f \n",idata, apvBaseline) ;
        
        //===============================================================//
        // Stefano Colafranceschi ZS code                                //
        //===============================================================//
        Int_t timebins, adcbin;
        Int_t chNo;
        
        
        idata+=1;
        //cout << "rawdata = " << fRawData16bits[idata] << " idata = " << idata << " hex is : " << "0x" << std::hex << fRawData16bits[idata] << std::dec << endl;
        //cin.get();
        
        
        // Reading out number of time bins from the header
        std::stringstream ss;
        ss << std::hex << (fRawData16bits[1]>>8);
        ss >> adcbin;
        //cout << "adcbin = " << adcbin << endl;
        
        
        // VALID DATA AFTER idata=4
        if (idata>=4) {
            startDataFlag = kTRUE ;
        }
        
        
        if (startDataFlag == kTRUE) {
            
            //cout << "VALID DATA!!! " << endl;
            if ( ((idata-4)%(timebins+1))==0 ) {
                chNo = fRawData16bits[idata];
                Int_t stripNo = StripMapping(chNo) ;
                timebins = 0;
                cout << "timeBinADCs reset" << endl;
                if (timeBinADCs.size()>0) {
                    Float_t adcs = * (TMath::LocMax(timeBinADCs.begin(), timeBinADCs.end())) ;
                    if(adcs < 0) adcs = 0 ;
                    //cout << "Filling the hit!!!!" << stripNo << endl;
                    SRSHit * apvHit = new SRSHit() ;
                    apvHit->SetAPVID(fAPVID) ;
                    apvHit->IsHitFlag(kTRUE) ;
                    apvHit->SetDetector(fDetector) ;
                    apvHit->SetDetectorType(fDetectorType) ;
                    apvHit->SetReadoutBoard(fReadoutBoard) ;
                    apvHit->SetPadDetectorMap(fPadDetectorMap) ;
                    apvHit->SetPlane(plane) ;
                    apvHit->SetPlaneSize(fPlaneSize) ;
                    apvHit->SetTrapezoidDetRadius(fTrapezoidDetInnerRadius, fTrapezoidDetOuterRadius) ;
                    apvHit->SetAPVOrientation(fAPVOrientation) ;
                    apvHit->SetAPVstripmapping(fAPVstripmapping) ;
                    apvHit->SetAPVIndexOnPlane(fAPVIndexOnPlane) ;
                    apvHit->SetNbAPVsFromPlane(fNbOfAPVsFromPlane) ;
                    apvHit->SetTimeBinADCs(timeBinADCs) ;
                    apvHit->SetHitADCs(fZeroSupCut, adcs, fIsHitMaxOrTotalADCs) ;
                    apvHit->SetPadNo(padNo) ;
                    apvHit->SetStripNo(stripNo) ;
                    listOfHits.push_back(apvHit) ;
                }
                timeBinADCs.clear();
                //cout << "timeBinADCs cleared" << endl;
            }
            timebins++;
            //cout << "channel number = " << chNo << endl;
            //cin.get();
            
            commonModeOffset.clear(), commonModeOffset_odd.clear(), commonModeOffset_even.clear() ;
            
            Float_t commMode      = 0 ;
            Float_t commMode_odd  = 0 ;
            Float_t commMode_even = 0 ;
            
            //for(Int_t chNo = 0; chNo < NCH; ++chNo) {
            
            Int_t stripNo = StripMapping(chNo) ;
            Float_t rawdata = ((Float_t) fRawData16bits[idata]) ;
            
            Float_t comMode = rawdata ;
            Float_t thresohld = 500 ;
            if ((fReadoutBoard == "UV_ANGLE") &&  (fDetectorType == "EICPROTO1") ) thresohld = 500 	;
            if (fabs(comMode - apvBaseline) > thresohld) {
                comMode = apvBaseline ;
            }
            
            rawdata = 4096 - rawdata ;
            comMode = 4096 - comMode ;
            
            fapvTimeBinDataMap.insert(pair<Int_t, Float_t>(stripNo, rawdata)) ;
            //fapvTimeBinDataMapAdc.insert(pair<Int_t, vector<Float_t> >(stripNo, rawdata.at(i) )) ;
            fapvTimeBinDataMapAdc.insert(std::make_pair(std::make_pair(stripNo,rawdata), timebins));
            timeBinADCs.push_back(rawdata) ;
            //mandrakata
            //idata++ ;
            //}
            
            if ((fReadoutBoard == "UV_ANGLE") &&  (fDetectorType == "EICPROTO1") ) {
                commonModeOffset_odd.sort() ;
                commonModeOffset_even.sort() ;
                
                commMode_odd  = TMath::Mean(commonModeOffset_odd.begin(),commonModeOffset_odd.end()) ;
                commMode_even = TMath::Mean(commonModeOffset_even.begin(),commonModeOffset_even.end()) ;
                commonModeOffset_odd.clear() ;
                commonModeOffset_even.clear() ;
            }
            else {
                commonModeOffset.sort() ;
                commMode = TMath::Mean(commonModeOffset.begin(),commonModeOffset.end()) ;
                commonModeOffset.clear() ;
            }
            
            if (fIsRawPedestalRunFlag) {
                if ((fReadoutBoard == "UV_ANGLE") &&  (fDetectorType == "EICPROTO1") ) {
                    fCommonModeOffsets_odd.push_back(0) ;
                    fCommonModeOffsets_even.push_back(0) ;
                }
                else {
                    fCommonModeOffsets.push_back(0) ;
                }
            }
            else {
                if ((fReadoutBoard == "UV_ANGLE") &&  (fDetectorType == "EICPROTO1") ) {
                    fCommonModeOffsets_odd.push_back(commMode_odd) ;
                    fCommonModeOffsets_even.push_back(commMode_even) ;
                }
                else {
                    fCommonModeOffsets.push_back(commMode) ;
                }
            }
            startDataFlag = kFALSE ;
            continue ;
        }
        //idata++ ;
    }
    //  printf("  SRSAPVEvent::ComputeTimeBinCommonMode()==>exit \n") ;
}

//===================================================================
list <SRSHit * >  SRSAPVEvent::ComputeListOfAPVHits() {
    //printf("SRSAPVEvent::ComputeListOfAPVHits()==> enter \n") ;
    
    fIsCosmicRunFlag = kTRUE ;
    fIsPedestalRunFlag = kFALSE ;
    fIsRawPedestalRunFlag = kFALSE ;
    
    ComputeRawData16bits() ;
    
    Int_t idata = 0  ;
    list <SRSHit * > listOfHits ;
    TString plane = fPlane ;
    Int_t padNo = 0 ;
    vector<Float_t> timeBinADCs;
    timeBinADCs.clear();
    Float_t totalcharge=0;

    Bool_t startDataFlag = kFALSE ;
    
    fapvTimeBinDataMap.clear() ;
    UInt_t apvheaderlevel = (UInt_t)  fAPVHeaderLevel ;
    Int_t size = fRawData16bits.size() ;
        
    std::list<Float_t> commonModeOffset,  commonModeOffset_odd, commonModeOffset_even ;
    //Float_t apvBaseline = 4096 - TMath::Mean(fPedestalOffsets.begin(), fPedestalOffsets.end()) ;
    int warning=0, warn2=0;
    int low_limit=1200;
    //cout << "fRawData16bits.size = " << size << endl;
    while(idata < (size-1)) {
        //printf("    SRSAPVEvent::ComputeTimeBinCommonMode()  ==> idata=%d, apvBaseline=%f \n",idata, apvBaseline) ;
        
        //===============================================================//
        // Stefano Colafranceschi ZS code                                //
        //===============================================================//
        
        Int_t adcbin, chNo;
        
        idata+=1;
        // Global Event Dump
        /*
         cout << "GLOBAL DUMP fRawData16bits.size = " << size << " rawdata = " << fRawData16bits[idata] << " idata = " << idata << " hex is : " << "0x" << std::hex << fRawData16bits[idata] << std::dec << endl;
         cin.get();
         */
        
        // Reading out number of time bins from the header
        std::stringstream ss;
        ss << std::hex << (fRawData16bits[1]>>8);
        ss >> adcbin;
        //cout << "adcbin = " << adcbin << endl;
        
        
        // VALID DATA AFTER idata=4
        if ( idata>=4 ) {
            if ( size>4 ) {
                //cout << "Valid data found!" << endl;
                startDataFlag = kTRUE ;
            }
        }
        
        if (startDataFlag == kTRUE) {
            //cout << "1: startDataFlag == kTRUE" << endl;
            //cout << "VALID DATA!!! " << endl;
            if ( ((idata-4)%(adcbin+1))==0 ) {
                //cout << "2: ((idata-4)%(adcbin+1))==0" << idata << "," << adcbin << endl;
                chNo = fRawData16bits[idata]; //--- Eraldo
                //totalcharge=0;
//                cout << "channel " << chNo << endl;
            }
            
            if ( ((idata-4)%(adcbin+1))==adcbin ) {
                Int_t stripNo = StripMapping(chNo) ;

                if (timeBinADCs.size()>0) {
                    //cout << "3: timeBinADCs.size()>0" << endl;
                    Float_t adcs = * (TMath::LocMax(timeBinADCs.begin(), timeBinADCs.end())) ;
                    if(adcs < 0) adcs = 0 ;
/*
if (totalcharge>=8000) {
   timeBinADCs.clear();
   adcs=1999;
   timeBinADCs.push_back(adcs);
}
*/
//if (totalcharge<5000) {
                    //cout << "rawdata " << adcs << endl;
                    //cout << "Filling the hit!!!! " << stripNo << endl;
                    SRSHit * apvHit = new SRSHit() ;
                    apvHit->SetAPVID(fAPVID) ;
                    apvHit->IsHitFlag(kTRUE) ;
                    apvHit->SetDetector(fDetector) ;
                    apvHit->SetDetectorType(fDetectorType) ;
                    apvHit->SetReadoutBoard(fReadoutBoard) ;
                    apvHit->SetPadDetectorMap(fPadDetectorMap) ;
                    apvHit->SetPlane(plane) ;
                    apvHit->SetPlaneSize(fPlaneSize) ;
                    apvHit->SetTrapezoidDetRadius(fTrapezoidDetInnerRadius, fTrapezoidDetOuterRadius) ;
                    apvHit->SetAPVOrientation(fAPVOrientation) ;
                    apvHit->SetAPVstripmapping(fAPVstripmapping) ;
                    apvHit->SetAPVIndexOnPlane(fAPVIndexOnPlane) ;
                    apvHit->SetNbAPVsFromPlane(fNbOfAPVsFromPlane) ;
                    apvHit->SetTimeBinADCs(timeBinADCs) ;
                    apvHit->SetHitADCs(fZeroSupCut, adcs, fIsHitMaxOrTotalADCs) ;
                    apvHit->SetPadNo(padNo) ;
                    apvHit->SetStripNo(stripNo) ;
//                    cout << "Filling..." << stripNo << " adcs = " << adcs << endl;
                      totalcharge=0;
                    listOfHits.push_back(apvHit) ;
//}
                }
                timeBinADCs.clear();
                //cout << "timeBinADCs cleared" << endl;
            }
            
            // Getting the rawdata (Taking into account signed integers) and save them
            Float_t rawdata = ((Float_t) fRawData16bits[idata]) ;
            Float_t oldrawdata, veryoldrawdata;
            if ((fRawData16bits[idata]>>8)!=0) rawdata = rawdata - 65536;
            rawdata = - rawdata ;
            totalcharge = totalcharge + rawdata;
/*
            if (warning==2) {
                if (rawdata<50) {
                    rawdata=1999;
                    warning=0;
                }
                if (rawdata>low_limit) {
                    if ( abs(veryoldrawdata-oldrawdata)<10) {
                       rawdata=1999;
                       timeBinADCs.push_back(rawdata) ;
                       cout << "rawdata " << rawdata << endl;
                       warning = 0;
                    }
                    else {
                       timeBinADCs.push_back(oldrawdata) ;
                      cout << "rawdata " << oldrawdata << endl;
                       timeBinADCs.push_back(veryoldrawdata) ;
                      cout << "rawdata " << veryoldrawdata << endl;
                       warning = 0;
                    }
                }
                if ( (rawdata<=low_limit) && (rawdata>50) ) {
                    warning = 0;
                }
            }

            if (warning==1) {
               if (rawdata<50) {
                  //cout << "warning was one so I set to 1999 "<< endl;
                  oldrawdata=1999;
                  cout << "rawdata " << oldrawdata << endl;
                  timeBinADCs.push_back(oldrawdata) ;
                  warning=0;
               }
               if (rawdata>low_limit) {
                  warning=2;
                  veryoldrawdata=oldrawdata;
                  oldrawdata=rawdata;
               }
               if ( (rawdata<=low_limit) && (rawdata>50) ) {
                  cout << "rawdata " << oldrawdata << endl;  
                  timeBinADCs.push_back(oldrawdata) ;
                  warning = 0 ;
               }
            }

            if (rawdata>low_limit) {
               if (warning==0) warning=1;
               oldrawdata=rawdata;
               //cout << "found rawdata greater than << low_limit << setting warning to 1" << endl;
            }
            else {
                cout << "rawdata " << rawdata << endl;
                timeBinADCs.push_back(rawdata);
            }
*/
//if (totalcharge>5000) rawdata=1999;
//cout << "rawdata " << rawdata << endl; //<<" total " << totalcharge << endl;
timeBinADCs.push_back(rawdata) ;
            
            // Event Dump
            //cout << "fRawData16bits.size = " << size << " channel number = " << "StripNo" << " rawdata = " << fRawData16bits[idata] << " idata = " << idata << " hex is : " << "0x" << std::hex << fRawData16bits[idata] << std::dec << " MSB = " << (fRawData16bits[idata]>>8) << " ADC==" << rawdata<< endl;
            //printf(" CIAOOOOO \n");
            //cin.get();
            
            startDataFlag = kFALSE ;
            continue ;
        }
    }
    //  printf("  SRSAPVEvent::ComputeTimeBinCommonMode()==>exit \n") ;
    return listOfHits ;
}

//========================================================================================================================
void SRSAPVEvent::ComputeMeanTimeBinRawPedestalData() {
    //  printf("SRSAPVEvent::ComputeMeanTimeBinRawPedestalData() \n") ;
    
    fPedSubFlag = kFALSE ;
    fIsCosmicRunFlag = kFALSE ;
    
    fIsPedestalRunFlag = kFALSE ;
    fIsRawPedestalRunFlag = kTRUE ;
    
    ComputeRawData16bits() ;
    ComputeTimeBinCommonMode() ;
    fRawPedestalData.clear() ;
    
    vector<Float_t>  meanTimeBinRawPedestalDataVect ;
    pair<multimap<Int_t, Float_t>::iterator, multimap<Int_t, Float_t>::iterator> stripSetOfTimeBinRawData ;
    for (Int_t stripNo = 0;  stripNo < NCH; stripNo++) {
        stripSetOfTimeBinRawData = fapvTimeBinDataMap.equal_range(stripNo) ;
        multimap<Int_t, Float_t>::iterator timebin_it ;
        Int_t timebin = 0 ;
        for (timebin_it = stripSetOfTimeBinRawData.first; timebin_it != stripSetOfTimeBinRawData.second; ++timebin_it) {
            Float_t rawdata = timebin_it->second ;
            
            if ((fReadoutBoard == "UV_ANGLE") &&  (fDetectorType == "EICPROTO1") ) {
                if(stripNo < 64) meanTimeBinRawPedestalDataVect.push_back(rawdata - fCommonModeOffsets_even[timebin]) ;
                else             meanTimeBinRawPedestalDataVect.push_back(rawdata - fCommonModeOffsets_odd[timebin]) ;
            }
            else {
                meanTimeBinRawPedestalDataVect.push_back(rawdata - fCommonModeOffsets[timebin]) ;
            }
            timebin++ ;
        }
        fRawPedestalData.push_back(TMath::Mean(meanTimeBinRawPedestalDataVect.begin(),meanTimeBinRawPedestalDataVect.end())) ;
        meanTimeBinRawPedestalDataVect.clear() ;
    }
}

//========================================================================================================================
void SRSAPVEvent::ComputeMeanTimeBinPedestalData() {
    //  printf("SRSAPVEvent::ComputeMeanTimeBinPedestalData() \n") ;
    
    fPedSubFlag        = kFALSE ;
    fIsCosmicRunFlag   = kFALSE ;
    
    fIsPedestalRunFlag = kTRUE ;
    fIsRawPedestalRunFlag = kFALSE ;
    
    ComputeRawData16bits() ;
    ComputeTimeBinCommonMode() ;
    fPedestalData.clear() ;
    
    vector<Float_t>  meanTimeBinPedestalDataVect ;
    pair<multimap<Int_t, Float_t>::iterator, multimap<Int_t, Float_t>::iterator> stripSetOfTimeBinRawData ;
    for (Int_t stripNo = 0;  stripNo < NCH; stripNo++) {
        stripSetOfTimeBinRawData = fapvTimeBinDataMap.equal_range(stripNo) ;
        multimap<Int_t, Float_t>::iterator timebin_it ;
        Int_t timebin = 0 ;
        for (timebin_it = stripSetOfTimeBinRawData.first; timebin_it != stripSetOfTimeBinRawData.second; ++timebin_it) {
            Float_t rawdata = timebin_it->second ;
            
            if ((fReadoutBoard == "UV_ANGLE") &&  (fDetectorType == "EICPROTO1") ) {
                if(stripNo < 64) meanTimeBinPedestalDataVect.push_back(rawdata - fCommonModeOffsets_even[timebin]) ;
                else             meanTimeBinPedestalDataVect.push_back(rawdata - fCommonModeOffsets_odd[timebin]) ;
            }
            else {
                meanTimeBinPedestalDataVect.push_back(rawdata - fCommonModeOffsets[timebin]) ;
            }
            timebin++ ;
        }
        fPedestalData.push_back(TMath::Mean(meanTimeBinPedestalDataVect.begin(),meanTimeBinPedestalDataVect.end())) ;
        meanTimeBinPedestalDataVect.clear() ;
    }
}
