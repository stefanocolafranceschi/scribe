#include "TFile.h"
#include "TH1.h"
#include "TH2.h"
#include "TProfile.h"
#include "TRandom.h"
#include "TTree.h"
#include <stdio.h>
#include <stdlib.h>
void monitor(TString rootfile)
{
  //cout << rootfile;
  TFile *_file0 = TFile::Open(rootfile);
  THit->Process("/var/www/cgi-bin/ZSHitAnalysis.C");
}
