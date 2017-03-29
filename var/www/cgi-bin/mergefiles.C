int mergefiles(string path, int run, int many) {

   ostringstream convert, convert2;
   TChain ch("TCluster");
   TChain ch2("THit");
   string sconvert, inizio, fine, fullfile, finalfile, line, first, last, temp;
   TString tfullfile, tfinal;

   convert2 << run+many;
   fine = convert2.str();

   convert << run;
   first = convert.str();
   inizio= convert.str();

   for (Int_t i=0; i<many; i++) {
      convert.str("");
      convert << (run+i);
      sconvert = convert.str();
      sconvert.erase(0, sconvert.find_first_not_of('0'));
      //cout << sconvert << endl;
      temp = "ls "+path+"/*Run" + sconvert + "_*.root | grep -v ped > /srsconfig/mergingtemp.txt";
      system(temp.c_str());
 // ifstream myfile ("/srsconfig/mergingtemp.txt");

  //if (myfile.is_open()) {
 //   while ( getline (myfile,line) ) {
 //     cout << line << '\n';
 //   }
 //   myfile.close();
 // }
ifstream myReadFile;

 myReadFile.open("/srsconfig/mergingtemp.txt");
 //char output[100];
 if (myReadFile.is_open()) {

 while (!myReadFile.eof()) {
    myReadFile >> line;
 }
}
myReadFile.close();

      //fullfile = path + sconvert + path2 + ".root";
      //cout << fullfile << endl;
      tfullfile = line;
      ch.Add(tfullfile);
      ch2.Add(tfullfile);
   }
   convert.str("");
   convert << (run+many-1);
   last = convert.str();

   finalfile = path + "/Runs"+ inizio + "_" + fine + ".root";
   //cout << finalfile << endl;
   tfinal = finalfile;
   ch.Merge(tfinal);
   //ch2.Merge(tfinal);
/*
   ostringstream convert;
   TChain ch2("THit");
   //string sconvert;
   //string fullfile;
   //string finalfile;
   //string first, last;
   //TString tfullfile, tfinal;

   convert << run;
   first = convert.str();
   for (Int_t i=0; i<many; i++) {
      convert.str("");
      convert << (run+i);
      sconvert = convert.str();
      sconvert.erase(0, sconvert.find_first_not_of('0'));
      //cout << sconvert << endl;
      fullfile = path + sconvert + path2 + ".root";
      //cout << fullfile << endl;
      tfullfile = fullfile;
      ch2.Add(tfullfile);
   }
   convert.str("");
   convert << (run+many-1);
   last = convert.str();

   finalfile = path + first + "-" + last + path2 + "ht.root";
   //cout << finalfile << endl;
   tfinal = finalfile;
   ch2.Merge(tfinal);
*/
}
