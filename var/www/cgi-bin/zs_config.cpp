//v5: config for up to 4 FECs (change number with "NUMBER_OF_FEC_CARDS")
//v6: Use socket functions for UDP communication, supports PLL fine phase tuning
//v7: supports Zero Suppression Common Mode information

//copyright: andre.zibell@cern.ch
//programm is far from being complete of error-free - use and modify at own risk
//latest modifications: 22.6.2015

// modified by scolafranceschi@fit.edu
// added external files and tuning (03.12.2015)

#include <stdio.h>
#include <iostream>
#include <iomanip>
#include <fstream>
#include <string>
#include <sstream>
#include <stdlib.h> 
#include <string.h>
#include <vector>

#include "TApplication.h"
#include "TCanvas.h"
#include "TLine.h"
#include "TF3.h"
#include "TFile.h"
#include "TH1I.h"
#include "TString.h"
#include "TEnv.h"
#include "TMath.h"

using namespace std;

#include "srs_udp_tools_sock.cpp"

void print_usage(void);
uint16_t swapbytes(uint16_t);


int main(int argc, char* argv[])
{
int c;
bool verboseout = 1;

	if(argc < 2)
	{
		print_usage();

		return 1;
	}

    // Reading out the configuration file
    ifstream inputFile("/srsconfig/zs.txt");
    string line, name, fieldvalue;
    unsigned int value, PLL, APV_ICAL, APV_LATENCY, APV_IPRE, APV_ISHA, APV_IMUXIN, APV_VPSP, APV_VFP, APV_CSEL, FEC_APV_MASK, VAL_FEC_DATASWITCH, VAL_FEC_TRIGBURST, VAL_FEC_TRIGDELAY, VAL_FEC_ROSYNC, VAL_FEC_DATALENGTH, VAL_FEC_EVINFO, VAL_FEC_APZTRSH, VAL_FEC_APZPRMS, VAL_SRU_EVENTBUILDINGMODE, VAL_SRU_AUTOTRIG, VAL_SRU_TIMEOUT, VAL_SRU_RODBUSY_TRSH, VAL_SRU_DETECTOR_ID, VAL_SRU_BCNT_OFFSET, VAL_SRU_RUNNUMBER, REG_SRU_gen_stat, REG_SRU_gen_ctrl, REG_SRU_dtcc_ctrl,REG_SRU_trig_src, REG_SRU_trig_ctrl, REG_SRU_rodbusy_trsh, REG_SRU_run_type, REG_SRU_time_stamp, REG_SRU_detector_id, REG_SRU_bcnt_offset, REG_SRU_sclink_wc, REG_SRU_fifo_cnt, REG_SRU_slink_last, REG_SRU_status_last, REG_SRU_l1id_last, REG_SRU_rodbusy_cnt, REG_SRU_evbuild_cnt, REG_SRU_trig_cnt, REG_SRU_RESET;
    string VAL_IP_SRU;


    while (getline(inputFile, line))
    {
        //cout << line << endl;
        istringstream ss1(line);
        ss1 >> name >> fieldvalue;

        std::stringstream ss;

        if (name == "PLL") {
            ss<<std::dec<<fieldvalue;
            ss>>PLL;
        }
        if (name == "APV_LATENCY") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_LATENCY;
        }
	if (name == "APV_ICAL") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_ICAL;
        }
        if (name == "APV_IPRE") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_IPRE;
        }
            
        if (name == "APV_ISHA") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_ISHA;
        }
            
        if (name == "APV_IMUXIN") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_IMUXIN;
        }
        if (name == "APV_VPSP") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_VPSP;
        }
        if (name == "APV_VFP") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_VFP;
        }
        if (name == "APV_CSEL") {
            ss<<std::dec<<fieldvalue;
            ss>>APV_CSEL;
        }
        if (name == "FEC_APV_MASK") {
            ss<<std::hex<<fieldvalue;
            ss>>FEC_APV_MASK;
        }
        if (name == "VAL_FEC_DATASWITCH") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_FEC_DATASWITCH;
        }
        if (name == "VAL_FEC_TRIGBURST") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_FEC_TRIGBURST;
        }
        if (name == "VAL_FEC_TRIGDELAY") {
            ss<<std::dec<<fieldvalue;
            ss>>VAL_FEC_TRIGDELAY;
        }
        if (name == "VAL_FEC_ROSYNC") {
            ss<<std::dec<<fieldvalue;
            ss>>VAL_FEC_ROSYNC;
        }
        if (name == "VAL_FEC_DATALENGTH") {
            ss<<std::dec<<fieldvalue;
            ss>>VAL_FEC_DATALENGTH;
        }
        if (name == "VAL_FEC_EVINFO") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_FEC_EVINFO;
        }
        if (name == "VAL_FEC_APZTRSH") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_FEC_APZTRSH;
        }
        if (name == "VAL_FEC_APZPRMS") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_FEC_APZPRMS;
        }
        if (name == "VAL_IP_SRU") {
            VAL_IP_SRU = fieldvalue;
        }
        if (name == "VAL_SRU_EVENTBUILDINGMODE") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_SRU_EVENTBUILDINGMODE;
        }
        if (name == "VAL_SRU_AUTOTRIG") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_SRU_AUTOTRIG;
        }
        if (name == "VAL_SRU_TIMEOUT") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_SRU_TIMEOUT;
        }
        if (name == "VAL_SRU_RODBUSY_TRSH") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_SRU_RODBUSY_TRSH;
        }
        if (name == "VAL_SRU_DETECTOR_ID") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_SRU_DETECTOR_ID;
        }
        if (name == "VAL_SRU_BCNT_OFFSET") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_SRU_BCNT_OFFSET;
        }
        if (name == "VAL_SRU_RUNNUMBER") {
            ss<<std::hex<<fieldvalue;
            ss>>VAL_SRU_RUNNUMBER;
        }
        if (name == "REG_SRU_gen_stat") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_gen_stat;
        }
        if (name == "REG_SRU_gen_ctrl") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_gen_ctrl;
        }
        if (name == "REG_SRU_dtcc_ctrl") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_dtcc_ctrl;
        }
        if (name == "REG_SRU_trig_src") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_trig_src;
        }
        if (name == "REG_SRU_trig_ctrl") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_trig_ctrl;
        }
        if (name == "REG_SRU_rodbusy_trsh") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_rodbusy_trsh;
        }
        if (name == "REG_SRU_run_type") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_run_type;
        }
        if (name == "REG_SRU_time_stamp") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_time_stamp;
        }
        if (name == "REG_SRU_detector_id") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_detector_id;
        }
        if (name == "REG_SRU_bcnt_offset") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_bcnt_offset;
        }
        if (name == "REG_SRU_sclink_wc") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_sclink_wc;
        }
        if (name == "REG_SRU_fifo_cnt") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_fifo_cnt;
        }
        if (name == "REG_SRU_slink_last") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_slink_last;
        }
        if (name == "REG_SRU_status_last") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_status_last;
        }
        if (name == "REG_SRU_l1id_last") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_l1id_last;
        }
        if (name == "REG_SRU_rodbusy_cnt") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_rodbusy_cnt;
        }
        if (name == "REG_SRU_evbuild_cnt") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_evbuild_cnt;
        }
        if (name == "REG_SRU_trig_cnt") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_trig_cnt;
        }
        if (name == "REG_SRU_RESET") {
            ss<<std::hex<<fieldvalue;
            ss>>REG_SRU_RESET;
        }
    }

    // Reading out how many FEC are present
    ifstream myReadFile;
    myReadFile.open("/srsconfig/fecnum.txt");
    string output;
    int NUMBER_OF_FEC_CARDS=0;
    if (myReadFile.is_open()) {
        while (!myReadFile.eof()) {
            myReadFile >> NUMBER_OF_FEC_CARDS;
        }
    }
    myReadFile.close();
    //cout << NUMBER_OF_FEC_CARDS << endl;

    // Reading out where to save data
    myReadFile.open("/srsconfig/rawdatadir.txt");
    string datadir;
    if (myReadFile.is_open()) {
        while (!myReadFile.eof()) {
            myReadFile >> datadir;
        }
    }
    myReadFile.close();

    // Declaring FEC variables
    string IP_FEC[NUMBER_OF_FEC_CARDS];     // IP adress for each FEC
    int DAQ_IP_FEC[NUMBER_OF_FEC_CARDS];     // IP adress for each FEC
    int PLL_FEC[NUMBER_OF_FEC_CARDS];       // PLL for each FEC
    int FEC_APVMASK[NUMBER_OF_FEC_CARDS];   // APV mask for each FEC
    

    // Assign each FEC its variable
    int i=0;
    myReadFile.open("/srsconfig/allfecs.txt");
    if (myReadFile.is_open()) {
        while (i < NUMBER_OF_FEC_CARDS) {
            myReadFile >> IP_FEC[i];
            //cout << IP_FEC[i] << endl;
            PLL_FEC[i] = PLL;
            FEC_APVMASK[i] = FEC_APV_MASK;



    std::istringstream iss(IP_FEC[i]);
    std::string token;
    std::string res="";
    int kk=0;
    while (std::getline(iss, token, '.'))
    {
        kk++;
        int decimal_value = atoi(token.c_str());
        if (kk==4) decimal_value=3;         
        std::stringstream ss;
        ss<< std::setfill('0') << std::setw(2) << std::hex << decimal_value;
        res = res + ss.str() ;
    }
    //std::cout << "res " << res << endl;
    
    std::stringstream converter(res);
    unsigned int valuee;
    converter >> std::hex >> valuee;
    
    DAQ_IP_FEC[i] = valuee;
    if (verboseout) cout << "DAQ IP is " << std::hex << DAQ_IP_FEC[i] << std::dec << endl;

            i++;
        }
    }


    // Assign SRU IP its variable
    ifstream srsFile;
    srsFile.open("/srsconfig/sru_ip.txt");

    while (std::getline(srsFile, VAL_IP_SRU))
    {
       //cout << "SRU IP is " << VAL_IP_SRU << endl;
    }
    srsFile.close();

    if (verboseout) cout << "SRU IP is " << VAL_IP_SRU  << std::dec << endl;

    
    
	bool do_config_SRU = false;	
	bool do_config_FEC = false;	
	bool do_config_APV = false;	
	bool do_config_APZ = false;	
	bool do_read_sigped = false;	
	bool do_tune_PLL = false;	
	bool do_config_CMC = false;	// CMN: Commmem Mode Noise
	VERBOSE_MODE = false;
        
	for(int i = 1; i < argc; i++)
	{
		if(strcmp(argv[i], "SRU") == 0)
		{
			do_config_SRU = true;
		}
		else if(strcmp(argv[i], "FEC") == 0)
		{
			do_config_FEC = true;
		}
		else if(strcmp(argv[i], "APV") == 0)
		{
			do_config_APV = true;
		}
		else if(strcmp(argv[i], "APZ") == 0)
		{
			do_config_APZ = true;
		}
		else if(strcmp(argv[i], "SIGPED") == 0)
		{
			do_read_sigped = true;
		}
		else if(strcmp(argv[i], "PLL") == 0)
		{
			do_tune_PLL = true;
		}
		else if(strcmp(argv[i], "CMN") == 0)
		{
			do_config_CMC = true;
		}
		else if(strcmp(argv[i], "VERBOSE") == 0)
		{
			VERBOSE_MODE = true;
		}
		else if(strcmp(argv[i], "ALL") == 0)
		{
			do_config_SRU = true;
			do_config_FEC = true;
			do_config_APV = true;
			do_config_APZ = true;
			do_read_sigped = true;
			//do_tune_PLL = true; //not part of the default actions
			//do_config_CMC = true; //not part of the default actions
		}

		else
		{
			if (verboseout) cout << endl << "Unknown parameter '" << argv[i] << "'" << endl;
			print_usage();
			return 1;
		}
	}	

	string IP_SRU = VAL_IP_SRU;

	int SRU_EVENTBUILDINGMODE = VAL_SRU_EVENTBUILDINGMODE; 

	int SRU_TIMEOUT = VAL_SRU_TIMEOUT;
	SRU_TIMEOUT *= 0x10000;
	SRU_TIMEOUT += (int)(TMath::Power(2,NUMBER_OF_FEC_CARDS)-1) * 0x1000;
	int SRU_AUTOTRIG = VAL_SRU_AUTOTRIG;

	int SRU_RODBUSY_TRSH = VAL_SRU_RODBUSY_TRSH;
	int SRU_DETECTOR_ID = VAL_SRU_DETECTOR_ID;
	int SRU_BCNT_OFFSET = VAL_SRU_BCNT_OFFSET;
	int SRU_RUNNUMBER = VAL_SRU_RUNNUMBER;

	int FEC_DATASWITCH = VAL_FEC_DATASWITCH;
	int FEC_TRIGBURST = VAL_FEC_TRIGBURST;
	int FEC_TRIGDELAY = VAL_FEC_TRIGDELAY;
	int FEC_ROSYNC = VAL_FEC_ROSYNC;
	int FEC_DATALENGTH = VAL_FEC_DATALENGTH;
	int FEC_EVINFO = VAL_FEC_EVINFO;
	int FEC_APZTRSH = VAL_FEC_APZTRSH;
	int FEC_APZPRMS = VAL_FEC_APZPRMS;

	time_t now = time(0);

	if(do_config_APV)
	{	
		for(int i = 0; i < NUMBER_OF_FEC_CARDS; i++)
		{
			for (int j = 0; j < 3; j++)	//do it twice...
			{

				if (verboseout) cout << endl << "sending INIT signals for FEC "<< i << endl;
                                if (verboseout) cout << "DAQ_IP is " << std::hex << DAQ_IP_FEC[i] << std::dec << endl;				
				std::vector<uint32_t> regval;

				// default initialisation of ADC card, port 0x6519
				regval.push_back(0x0); regval.push_back(0x0); 
				regval.push_back(0x1); regval.push_back(0x0); 
				regval.push_back(0x2); regval.push_back(0x0); 
				regval.push_back(0x3); regval.push_back(0x0); 
				regval.push_back(0x4); regval.push_back(0x0); 
				regval.push_back(0x5); regval.push_back(0x0); 
				regval.push_back(0x6); regval.push_back(0xff); 

				setmultipleSRSregistervalues(IP_FEC[i], 6519, 0x0, &regval);
				regval.clear();


				// default initialisation of ADC card, port 0x6519, step 2: de-assert APV reset
				regval.push_back(0x0); regval.push_back(0xff); 

				setmultipleSRSregistervalues(IP_FEC[i], 6519, 0x0, &regval);
				regval.clear();


				// default initialisation of APV Hybrids, port 6263, subaddr xxxxff03 (all APVs)
				regval.push_back(0x10); regval.push_back(APV_IPRE);
				regval.push_back(0x11); regval.push_back(0x3c);
				regval.push_back(0x12); regval.push_back(0x22);
				regval.push_back(0x13); regval.push_back(APV_ISHA);
				regval.push_back(0x14); regval.push_back(0x22);
				regval.push_back(0x15); regval.push_back(0x37);
				regval.push_back(0x16); regval.push_back(APV_IMUXIN);
				regval.push_back(0x17); regval.push_back(0x0);
				regval.push_back(0x18); regval.push_back(APV_ICAL);
				regval.push_back(0x19); regval.push_back(APV_VPSP);
				regval.push_back(0x1a); regval.push_back(0x3c);
				regval.push_back(0x1b); regval.push_back(APV_VFP);
				regval.push_back(0x1c); regval.push_back(0x0); //it was ef
				regval.push_back(0x1d); regval.push_back(APV_CSEL);
				regval.push_back(0x1); regval.push_back(0x19);
				regval.push_back(0x2); regval.push_back(APV_LATENCY);
				regval.push_back(0x3); regval.push_back(0x4);
				regval.push_back(0x0); regval.push_back(0x0);

				setmultipleSRSregistervalues(IP_FEC[i], 6263, 0xff03, &regval);
                                usleep(100000);
				regval.clear();


				// default initialisation of ADC Application, port 6039 (Resync APVs)
				regval.push_back(0xffffffff); regval.push_back(0x1);

				setmultipleSRSregistervalues(IP_FEC[i], 6039, 0x0, &regval);
				regval.clear();
				
				usleep(100000);
			}
		}
	}

	  
	  
	if(do_config_FEC)
	{	
		if (verboseout) cout << endl << "number of FECs is use : " << NUMBER_OF_FEC_CARDS << endl;
    char fn [100];
		for(int i = 0; i < NUMBER_OF_FEC_CARDS; i++)
		{


	snprintf (fn, sizeof fn, "/srsconfig/fecmask%d", i);
	ifstream f(fn);
	if (f.good()) {
   	   f >> line;
if (verboseout) cout << line << i << endl;
std::stringstream ss;
	   ss<<std::hex<<line;
	   ss>>FEC_APVMASK[i];
if (verboseout) cout << ss << " " << endl;
   	   if (verboseout) cout << "READING FECMASK......... "  << hex << FEC_APVMASK[i] << dec << endl;
   	   setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x8, FEC_APVMASK[i]);                        
           usleep(400000);
           f.close();
        }

			if (verboseout) cout << "configure FEC " << i << " #1..." << hex << DAQ_IP_FEC[i] << dec <<endl;

			std::vector<uint32_t> regval;

			//initialisation of FEC system port
			regval.push_back(0xa); regval.push_back(DAQ_IP_FEC[i]);
			regval.push_back(0xb); regval.push_back(FEC_DATASWITCH);

			setmultipleSRSregistervalues(IP_FEC[i], 6007, 0x0, &regval);
			regval.clear();


			//initialisation of FEC application port
			regval.push_back(0x0); regval.push_back(0x0);
			regval.push_back(0x1); regval.push_back(FEC_TRIGBURST);
			regval.push_back(0x2); regval.push_back(0x7D0);
			regval.push_back(0x3); regval.push_back(FEC_TRIGDELAY);
			regval.push_back(0x5); regval.push_back(FEC_ROSYNC);
			regval.push_back(0x8); regval.push_back(FEC_APVMASK[i]);
			regval.push_back(0x9); regval.push_back(FEC_DATALENGTH);
			regval.push_back(0xc); regval.push_back(FEC_EVINFO);
			regval.push_back(0xb); regval.push_back(0x2000);		//debug - not necessary?
			regval.push_back(0xf); regval.push_back(0x0);

			setmultipleSRSregistervalues(IP_FEC[i], 6039, 0x0, &regval);
			regval.clear();
			
			setSRSregistervalue(IP_FEC[i], 6263, 0xff00, 0x1, PLL_FEC[i], true); //set all PLL chips to default phase shift value. may be changed later when tuning procedure PLL is enabled


			if (verboseout) cout << "DONE" << endl << endl;
		}
	}


	if(do_config_SRU)
	{	

		cout << "configure SRU..." << endl;

        
//		cout << "	sending reset signal" << endl;
//		setSRSregistervalue(IP_SRU, 6010, 0x0, 0xffffffff, 0xffffffff);

		std::vector<uint32_t> regval;

		//initialisation of SRU application port
		regval.push_back(REG_SRU_trig_src); regval.push_back(0x3);
		regval.push_back(REG_SRU_gen_ctrl); regval.push_back(SRU_EVENTBUILDINGMODE);
		regval.push_back(REG_SRU_time_stamp); regval.push_back(now);
		regval.push_back(REG_SRU_dtcc_ctrl); regval.push_back(SRU_TIMEOUT);
		regval.push_back(REG_SRU_trig_ctrl); regval.push_back(SRU_AUTOTRIG);
		regval.push_back(REG_SRU_rodbusy_trsh); regval.push_back(SRU_RODBUSY_TRSH);
		regval.push_back(REG_SRU_detector_id); regval.push_back(SRU_DETECTOR_ID);
		regval.push_back(REG_SRU_bcnt_offset); regval.push_back(SRU_BCNT_OFFSET);
		regval.push_back(REG_SRU_run_type); regval.push_back(SRU_RUNNUMBER);

		cout << "	setting SRU registers" << endl;
		setmultipleSRSregistervalues(IP_SRU, 6010, 0x0, &regval);
		regval.clear();

		cout << "DONE" << endl << endl;
		//system("./dump_SRS SRU VERBOSE");

	}

	if(do_tune_PLL)
	{	

		TString histtitle = "Rawdata_";
		histtitle += now;		
		histtitle += ".root";
		TFile * hfile = new TFile(histtitle, "RECREATE");

		for(int i = 0; i < NUMBER_OF_FEC_CARDS; i++)
		{

			setSRSregistervalue(IP_FEC[i], 6007, 0x0, 0xb, 0xddaa4201); //FEC data to Ethernet
			setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x1, 0x1); //temporary small number of tme bins
			setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x2, 0x9c40); //set low self trigger rate

			for (int apvid = 0; apvid < 16; apvid++)
			{


				if((FEC_APVMASK[i] & 1<<apvid) && ((apvid%2)==0)) //only connected Masters
				{
					cout << " checking phase values for FEC " << i << " IP " << IP_FEC[i] << " APV #" << apvid << endl;
					//select current apv
					setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x0, 0x0); //internal trigger source
					setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x12, apvid);
					setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x1f, 0xf); //Bypass Zero Suppression

					// mach den Kram!
					uint32_t bestphase = 0x0;
					int bestdiff = 0;

					uint32_t tempaddress = 0;
					if(apvid > 7) tempaddress += 8;
					tempaddress += (4-(apvid/2)+7);

					for(uint32_t phase = 0x0; phase <= 27; phase++)
					{
					
						if((phase > 11) && (phase < 16)) continue; //phase value must be <=11, for both phase flips (flipped for phase >= 16)
						
						//create histogram for raw data
						TString tempstring = "Rawdata_FEC_";
						tempstring += i;
						tempstring += "_APV_";
						tempstring += apvid;
						tempstring += "_Phase_";
						tempstring += phase;
						TH1I *h_rawdata = new TH1I(tempstring, tempstring, 2000, 0, 1999);

						setSRSregistervalue(IP_FEC[i], 6263, (1 << tempaddress), 0x1, phase, true); //Set phase test value
						
						setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0xf, 0x1); //Enable trigger generation
						int rc = receiveSRSUDPpacket(IP_FEC[i], 6006); //get packet from FEC to global variable "buffer"
						setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0xf, 0x0); //Disable trigger generation

						cout << rc << " bytes received - ";
						uint16_t APVdata[2048];
		
						//for(int j = 0; j < 60; j++)
						for(int j = 0; j < (FEC_DATALENGTH / 4); j++)
						{
							APVdata[2*j] = swapbytes((ntohl(buffer[j]) & 0xffff0000) / 0x10000);
							APVdata[(2*j)+1] = swapbytes(ntohl(buffer[j]) & 0xffff);

							//cout << setbase(16) << APVdata[2*j] << " " << APVdata[(2*j)+1] << " ";
						
							if(j > 4) //igore FEC Header "APZ..."
							{
//								h_rawdata[i][apvid]->SetBinContent(2*j, APVdata[2*j]);
//								h_rawdata[i][apvid]->SetBinContent(2*j+1, APVdata[2*j+1]);
								h_rawdata->SetBinContent(2*j, APVdata[2*j]);
								h_rawdata->SetBinContent(2*j+1, APVdata[2*j+1]);
							}
						}
						
						int tempmax = 0;
						int tempmin = 4096;

							for (int j = 12; j < 60; j++) //Use only the sync pulse after the event data
						{
							if(APVdata[j] > tempmax) tempmax = APVdata[j];
							if(APVdata[j] < tempmin) tempmin = APVdata[j];
						}

						if((tempmax-tempmin) > bestdiff)
						{
							bestdiff = tempmax-tempmin;
							bestphase = phase;
						}
						
						cout << "Phase " << phase << " min " << tempmin << " Max " << tempmax <<  " Diff " << tempmax - tempmin << endl;
						
//						h_rawdata[i][apvid]->Write();
//						h_rawdata->Write();
						usleep(50000);
					}

					setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x1f, 0x0); //Re-enable zero Suppression
					
					cout << "APV " << apvid << " regvalue " << (1 << tempaddress) << " Best Phase: " << bestphase << " Diff: " << bestdiff << endl << endl;
					setSRSregistervalue(IP_FEC[i], 6263, (1 << tempaddress), 0x1, bestphase, true); 
//					setSRSregistervalue(IP_FEC[i], 6263, 0xff00, 0x1, bestphase, true);
				}
			}

			setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x1, FEC_TRIGBURST); //correct number of tme bins
			setSRSregistervalue(IP_FEC[i], 6007, 0x0, 0xb, 0xddaa4200); //FEC data to SRU

		}

		hfile ->Write();
		hfile ->Close();

	}
	
	if(do_config_APZ)
	{	
                char fn [100];
		for(int i = 0; i < NUMBER_OF_FEC_CARDS; i++)
		{
                       int dynamicmask=0;
			int runtime_enabler=0;
			if (verboseout) cout << endl << "configure FEC "<< i <<" APZ..." << endl;

			//set moderate self trigger rate
			setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x2, 0x7d0);

			for (int apvid = 0; apvid < 16; apvid++)
			{
                                if (verboseout) cout << "FEC_APVMASK["<<i<<"]==" << FEC_APVMASK[i] << " apvid=" << apvid << "  FEC_APVMASK["<<i<<"] & 1<<apvid =" << (FEC_APVMASK[i] & 1<<apvid) << " while 1<<apvid = " << (1<<apvid) << endl;

				if(FEC_APVMASK[i] & 1<<apvid)
				{

					//select current apv
					setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x12, apvid);
                                        //usleep(400000);
                                        if (verboseout) cout << "select apv = " << apvid << endl;
					int calibresult = 0;
                                        int trials=0;

					while (calibresult != 0xa0)
					{
                                                trials++;
                                                if (trials>15) break;

                                                if (verboseout) cout << "APV=" << apvid << " runtime_enabler is " << runtime_enabler << endl;
						//send calibration command
						if (verboseout) cout << "	Send calibration command to APV 0x" << setbase(16) << apvid << flush;
						if(apvid%2 == 0) setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x1f, 0x2); //Master
													//AZ 19.6.: pll tuning works not so good - better leave default value of 0 in Munich test stand! (Command 3 = with PLL, Command 2 without)
						if(apvid%2 == 1) setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x1f, 0x2); //Slave

						usleep(400000);
						if (verboseout) cout << "." << flush;
//						usleep(1000000);
//						cout << "." << flush;
	
						calibresult = getSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x11);
						cout << setbase(16) << "	Status FEC APZ: 0x" << calibresult << endl;;
						calibresult = calibresult & 0xff;

						setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x1f, 0x0);
						usleep(200000);

               				}
					if (calibresult == 0xa0) runtime_enabler=runtime_enabler+TMath::Power(2,apvid);
				}
			}
                        if (verboseout) cout << " RUNTIME_ENABLER IS SET " << endl;

snprintf (fn, sizeof fn, "/srsconfig/fecmask%d", i);
ofstream myfile;
myfile.open(fn);
myfile << hex << runtime_enabler;
myfile.close();
			std::vector<uint32_t> regval;

			//initialisation of FEC APZ registers
			regval.push_back(0x14); regval.push_back(FEC_APZTRSH);
			regval.push_back(0x15); regval.push_back(FEC_APZPRMS);

			setmultipleSRSregistervalues(IP_FEC[i], 6039, 0x0, &regval);
			regval.clear();
                        usleep(500000);
                        setSRSregistervalue(IP_FEC[i], 6039, 0x0, 0x0f, 0x0);
		}
	}


	if(do_read_sigped)
	{	

		const unsigned short apv_sending_order_table[128] = {0,32,64,96,8,40,72,104,16,48,80,
		  112,24,56,88,120,1,33,65,97,9,41,73,105,17,49,81,113,25,57,89,121,2,34,66,98,
		  10,42,74,106,18,50,82,114,26,58,90,122,3,35,67,99,11,43,75,107,19,51,83,115,
		  27,59,91,123,4,36,68,100,12,44,76,108,20,52,84,116,28,60,92,124,5,37,69,101,
		  13,45,77,109,21,53,85,117,29,61,93,125,6,38,70,102,14,46,78,110,22,54,86,118,
		  30,62,94,126,7,39,71,103,15,47,79,111,23,55,87,119,31,63,95,127};
		
		TString histtitle = datadir + "/APZ_sigma_pedestal";
		//histtitle += now;
		histtitle += ".root";
		TFile * hfile = new TFile(histtitle, "RECREATE");

		TH1I ***h_sigma;
		h_sigma = new TH1I**[NUMBER_OF_FEC_CARDS];
		TH1I ***h_pedestal;
		h_pedestal = new TH1I**[NUMBER_OF_FEC_CARDS];

		for(int i = 0; i < NUMBER_OF_FEC_CARDS; i++)
		{

			if (verboseout) cout << endl << "Reading Sigmas/Pedestals from FEC "<< i <<"..." << endl;

	//		TH1I * h_sigma = new TH1I("APZ_Sigma","APZ_Sigma", 128,0,127);	
		
			h_sigma[i] = new TH1I*[16];
			h_pedestal[i] = new TH1I*[16];


			for (int apvid = 0; apvid < 16; apvid++)
			{
				if(FEC_APVMASK[i] & 1<<apvid)
				{
					if (verboseout) cout << "	reading sigped APVid " << apvid << setbase(10);


					uint32_t pedarray[128];
                                        usleep(500000);
					getSRSregisterpage(IP_FEC[i], 6040, apvid, 0x0, 128); //fill pedestal data into global array dataarray[128]
					usleep(500000);
					int tempmin, tempmax;
					tempmin = 4096; tempmax = 0;
					
					for(int j = 0; j < 128; j++)
					{
						pedarray[apv_sending_order_table[j]] = dataarray[j];
						if (dataarray[j] > tempmax) tempmax = dataarray[j];
						if (dataarray[j] < tempmin) tempmin = dataarray[j];
					}
					if (verboseout) cout << "	PedMaxMin: " << tempmax << "/" << tempmin;

					TString tempstring;
					tempstring = "FEC";
					tempstring += i;
					tempstring += "_APZ-Pedestal_APV_";
					tempstring += apvid;
					h_pedestal[i][apvid] = new TH1I(tempstring, tempstring, 128, 0, 128);
					h_pedestal[i][apvid]->SetXTitle("APV channel number (sorted)");
					h_pedestal[i][apvid]->SetYTitle("Pedestal [ADC counts]");
					
					for(int j = 0; j < 128; j++) h_pedestal[i][apvid]->SetBinContent(j+1, pedarray[j]);
					TCanvas canvasped;
					h_pedestal[i][apvid]->Draw();
					canvasped.Print(Form("/var/www/html/histo/%s.gif",h_pedestal[i][apvid]->GetName()));
					
                                        uint32_t sigarray[128];
                                        usleep(500000);
					getSRSregisterpage(IP_FEC[i], 6040, apvid, 0x80000000, 128); //fill sigma data into global array dataarray[128]
					usleep(500000);
					tempmin = 4096; tempmax = 0;

					for(int j = 0; j < 128; j++)
					{
						sigarray[apv_sending_order_table[j]] = dataarray[j];
						if (dataarray[j] > tempmax) tempmax = dataarray[j];
						if (dataarray[j] < tempmin) tempmin = dataarray[j];
					}
					if (verboseout) cout << " SigMaxMin: " << tempmax << "/" << tempmin << endl;

					tempstring = "FEC";
					tempstring += i;
					tempstring += "_APZ-Sigma_APV_";
					tempstring += apvid;
					h_sigma[i][apvid] = new TH1I(tempstring, tempstring, 128, 0, 128);
					h_sigma[i][apvid]->SetXTitle("APV channel number (sorted)");
					h_sigma[i][apvid]->SetYTitle("Sigma [ADC counts]");
					
					for(int j = 0; j < 128; j++) h_sigma[i][apvid]->SetBinContent(j+1, sigarray[j]);
				        TCanvas canvas;
					h_sigma[i][apvid]->Draw();
					canvas.Print(Form("/var/www/html/histo/%s.gif",h_sigma[i][apvid]->GetName()));
				}
			}
		}
		hfile ->Write();
		hfile ->Close();
	}


	if(do_config_FEC)
	{	
		for(int i = 0; i < NUMBER_OF_FEC_CARDS; i++)
		{

			if (verboseout) cout << "configure FEC " << i << " #2..." << endl;

			std::vector<uint32_t> regval;

			regval.push_back(0x0); regval.push_back(0x4); //Triggers from external. (= SRU OR(!!!) frontpanel NIM plug)
			regval.push_back(0x2); regval.push_back(40); //Short Deadtime. Needs to be done after (!) switch to external trigger, or a lot of internal triggers would happen...
			//regval.push_back(0xf); regval.push_back(0x1); //Last step: enable triggers - needs to be done AFTER APZ calibration

			setmultipleSRSregistervalues(IP_FEC[i], 6039, 0x0, &regval);
			regval.clear();

			//system("./dump_SRS FEC VERBOSE");

		}
	}


	if(do_config_CMC)
	{
		const unsigned short apv_sending_order_table[128] = {0,32,64,96,8,40,72,104,16,48,80,
		  112,24,56,88,120,1,33,65,97,9,41,73,105,17,49,81,113,25,57,89,121,2,34,66,98,
		  10,42,74,106,18,50,82,114,26,58,90,122,3,35,67,99,11,43,75,107,19,51,83,115,
		  27,59,91,123,4,36,68,100,12,44,76,108,20,52,84,116,28,60,92,124,5,37,69,101,
		  13,45,77,109,21,53,85,117,29,61,93,125,6,38,70,102,14,46,78,110,22,54,86,118,
		  30,62,94,126,7,39,71,103,15,47,79,111,23,55,87,119,31,63,95,127};
		
		TString histtitle = "APZ_sigma_pedestal_for_CMC_";
		histtitle += now;		
		histtitle += ".root";
		TFile * hfile = new TFile(histtitle, "RECREATE");

		TH1I ***h_sigma;
		h_sigma = new TH1I**[NUMBER_OF_FEC_CARDS];
		TH1I ***h_pedestal;
		h_pedestal = new TH1I**[NUMBER_OF_FEC_CARDS];
		
		for(int i = 0; i < NUMBER_OF_FEC_CARDS; i++)
		{

			cout << endl << "Reading Sigmas/Pedestals from FEC for Common Mode Noise Correction "<< i <<"..." << endl;

	//		TH1I * h_sigma = new TH1I("APZ_Sigma","APZ_Sigma", 128,0,127);	
		
			h_sigma[i] = new TH1I*[16];
			h_pedestal[i] = new TH1I*[16];


			for (int apvid = 0; apvid < 16; apvid++)
			{
				if(FEC_APVMASK[i] & 1<<apvid)
				{
				
					cout << "	setting Sigmas/Pedestals to zero APVid " << apvid << setbase(10) << endl;
					
					for (int nochannels = 0; nochannels < 4; nochannels++)
					{
						setSRSregistervalue(IP_FEC[i], 6040, apvid, 0x0+nochannels, 4095);
						setSRSregistervalue(IP_FEC[i], 6040, apvid, 0x80000000+nochannels, 0);
						setSRSregistervalue(IP_FEC[i], 6040, apvid, 0x0+nochannels+8, 4095);
						setSRSregistervalue(IP_FEC[i], 6040, apvid, 0x80000000+nochannels+8, 0);
					}
					
					cout << "	reading sigped APVid " << apvid << setbase(10);


					uint32_t pedarray[128];
					getSRSregisterpage(IP_FEC[i], 6040, apvid, 0x0, 128); //fill pedestal data into global array dataarray[128]
					
					int tempmin, tempmax;
					tempmin = 4096; tempmax = 0;
					
					for(int j = 0; j < 128; j++)
					{
						pedarray[apv_sending_order_table[j]] = dataarray[j];
						if (dataarray[j] > tempmax) tempmax = dataarray[j];
						if (dataarray[j] < tempmin) tempmin = dataarray[j];
					}
					cout << "	PedMaxMin: " << tempmax << "/" << tempmin;

					TString tempstring;
					tempstring = "FEC";
					tempstring += i;
					tempstring += "_APZ-Pedestal_APV_";
					tempstring += apvid;
					h_pedestal[i][apvid] = new TH1I(tempstring, tempstring, 128, 0, 128);
					h_pedestal[i][apvid]->SetXTitle("APV channel number (sorted)");
					h_pedestal[i][apvid]->SetYTitle("Pedestal [ADC counts]");
					
					for(int j = 0; j < 128; j++) h_pedestal[i][apvid]->SetBinContent(j+1, pedarray[j]);

					uint32_t sigarray[128];
					getSRSregisterpage(IP_FEC[i], 6040, apvid, 0x80000000, 128); //fill sigma data into global array dataarray[128]
					
					tempmin = 4096; tempmax = 0;

					for(int j = 0; j < 128; j++)
					{
						sigarray[apv_sending_order_table[j]] = dataarray[j];
						if (dataarray[j] > tempmax) tempmax = dataarray[j];
						if (dataarray[j] < tempmin) tempmin = dataarray[j];
					}
					cout << " SigMaxMin: " << tempmax << "/" << tempmin << endl;

					tempstring = "FEC";
					tempstring += i;
					tempstring += "_APZ-Sigma_APV_";
					tempstring += apvid;
					h_sigma[i][apvid] = new TH1I(tempstring, tempstring, 128, 0, 128);
					h_sigma[i][apvid]->SetXTitle("APV channel number (sorted)");
					h_sigma[i][apvid]->SetYTitle("Sigma [ADC counts]");
					
					for(int j = 0; j < 128; j++) h_sigma[i][apvid]->SetBinContent(j+1, sigarray[j]);
				
				}
			}
		}
		hfile ->Write();
		hfile ->Close();
	}
}

void print_usage(void)
{
	cout << endl << "USAGE: 'config_SRS [ALL] [SRU] [FEC] [APV] [APZ] [SIGPED] [PLL] [CMC] [VERBOSE]'" << endl;
	cout << "'SRU' resets and configures the SRU" << endl;
	cout << "'FEC' configures the FEC registers" << endl;
	cout << "'APV' configures the APV Hybrids (\"INIT\" command)" << endl;
	cout << "'APZ' does the pedestal, phase and sigma calibration of the zero suppression core" << endl;
	cout << "'SIGPED' retrieves sigma and pedestal values for all selected APVs from the FEC" << endl;
	cout << "'ALL' performs all steps above" << endl;
	cout << "'--- The Following options must be stated seperately! ---" << endl;
	cout << "'PLL' performs automatic tuning of the APV25 Master PLL chip phase delays" << endl;
	cout << "'CMC' Common Mode Correction - P.Loesel" << endl;
	cout << "'VERBOSE' enables low-level output of UDP communication" << endl << endl << endl;
}

uint16_t swapbytes(uint16_t APVdata)
{
	return (APVdata & 0xff)*0x100 + (APVdata & 0xff00)/0x100;
}

