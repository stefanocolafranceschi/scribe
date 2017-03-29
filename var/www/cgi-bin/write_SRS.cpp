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
	if(argc != 6)
	{
		print_usage();
		return 1;
	}

	setSRSregistervalue(argv[1], strtoul(argv[2], NULL, 10), strtoul(argv[3], NULL, 16), strtoul(argv[4], NULL, 16), strtoul(argv[5], NULL, 16));
	
	cout << setbase(16) << "0x" << getSRSregistervalue(argv[1], strtoul(argv[2], NULL, 10), strtoul(argv[3], NULL, 10), strtoul(argv[4], NULL, 16));
}

void print_usage(void)
{
	cout << endl << "USAGE: 'write_SRS [IP] [PORT] [SADDR] [ADDR] [VALUE]'" << endl;
	cout << "'IP' (string)is the IP address of the SRS component" << endl;
	cout << "''PORT' (decimal) is the port you want to write to" << endl;
	cout << "''SADDR' (decimal) is subaddress to write to" << endl;
	cout << "''ADDR' (hex) is the register number to write to" << endl;
	cout << "''VALUE' (hex) is value you want to write" << endl;
}

