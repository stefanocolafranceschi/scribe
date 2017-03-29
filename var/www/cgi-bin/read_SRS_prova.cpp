#include <stdio.h>
#include <iostream>
#include <iomanip>
#include <fstream>
#include <string>
#include <sstream>
#include <stdlib.h> 
#include <string.h>

using namespace std;

void print_usage(void);

#include "srs_udp_tools_sock.cpp"

int main(int argc, char* argv[])
{
	if(argc != 5)
	{
		print_usage();
		return 1;
	}

//	setSRSregistervalue(argv[1], strtoul(argv[2], NULL, 10), strtoul(argv[3], NULL, 10), strtoul(argv[4], NULL, 16), strtoul(argv[5], NULL, 16));
	
	cout << setbase(16) << "0x" << getSRSregistervalue(argv[1], strtoul(argv[2], NULL, 10), strtoul(argv[3], NULL, 16), strtoul(argv[4], NULL, 16))  << endl;

getSRSregisterpage(argv[1], strtoul(argv[2], NULL, 10), strtoul(argv[3], NULL, 16), strtoul("80000000", NULL, 16), 128);

cout << dataarray[2] << endl;

}

void print_usage(void)
{
	cout << endl << "USAGE: 'read_SRS [IP] [PORT] [SADDR] [ADDR]'" << endl;
	cout << "'IP' (string)is the IP address of the SRS component" << endl;
	cout << "''PORT' (decimal) is the port you want to read from" << endl;
	cout << "''SADDR' (hex) is subaddress to read from" << endl;
	cout << "''ADDR' (hex) is the register number to frad from" << endl;
}

