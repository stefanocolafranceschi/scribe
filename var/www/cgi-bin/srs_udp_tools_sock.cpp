#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <netdb.h>
#include <stdio.h>
#include <unistd.h>
#include <string.h>
#include <stdlib.h>
#include <sys/time.h>
#include <errno.h>
#include <vector>
#define SERVER_PORT 1234

int setSRSregistervalue(string, uint32_t, uint32_t, uint32_t, uint32_t, bool);

int setSRSregisterbit(string, uint32_t, uint32_t, uint32_t, uint32_t);

int clearSRSregisterbit(string, uint32_t, uint32_t, uint32_t, uint32_t);

int setmultipleSRSregistervalues(string, uint32_t, uint32_t, vector<uint32_t>*);

int getSRSregistervalue(string, uint32_t, uint32_t, uint32_t);

int getSRSregisterpage(string, uint32_t, uint32_t, uint32_t, uint32_t);

int sendSRSUDPpacket(string, uint32_t, vector<uint32_t>*);

int receiveSRSUDPpacket(string, uint32_t);

uint32_t buffer[2048];
uint32_t dataarray[256];
bool VERBOSE_MODE;


int setSRSregistervalue(string ip, uint32_t port, uint32_t saddr, uint32_t regaddr, uint32_t value, bool ignoreanswer=false)
{

	std::vector<uint32_t> regval;

	regval.push_back(0x80001234); 	//request ID
	regval.push_back(saddr);		//subaddr
	regval.push_back(0xaaaaffff);	
	regval.push_back(0xffffffff);	//write pairs
	regval.push_back(regaddr);		//register addr
	regval.push_back(value);		//value

	int rc_len = sendSRSUDPpacket(ip, port, &regval);

	if((ntohl(buffer[5])!=value) && (ignoreanswer==false))
	{
		//perror("\nWrong SRS Answer Value!\n");
		//return(-2);
	}

//for (i = 0; i < rc/sizeof(uint32_t); i++) {
//    printf("0x%x ", ntohl(buffer[i]));
//  }
	return(0);
}

int setSRSregisterbit(string ip, uint32_t port, uint32_t saddr, uint32_t regaddr, uint32_t bitnr)
{
	uint32_t registervalue = getSRSregistervalue(ip, port, saddr, regaddr);

	registervalue |= (1 << bitnr);

	setSRSregistervalue(ip, port, saddr, regaddr, registervalue);	
	
	return(0);
}

int clearSRSregisterbit(string ip, uint32_t port, uint32_t saddr, uint32_t regaddr, uint32_t bitnr)
{
	uint32_t registervalue = getSRSregistervalue(ip, port, saddr, regaddr);

	registervalue &= ~(1 << bitnr);

	setSRSregistervalue(ip, port, saddr, regaddr, registervalue);	
	
	return(0);
}

int setmultipleSRSregistervalues(string ip, uint32_t port, uint32_t saddr, vector<uint32_t>* regval_in)
{
	int i;
	std::vector<uint32_t> regval;

	regval.push_back(0x80001234); 	//request ID
	regval.push_back(saddr);		//subaddr
	regval.push_back(0xaaaaffff);	
	regval.push_back(0xffffffff);	//write pairs

	for(i = 0; i<regval_in->size(); i++)
	{
		regval.push_back(regval_in->at(i));
	}

	int rc_len = sendSRSUDPpacket(ip, port, &regval);
}

int getSRSregistervalue(string ip, uint32_t port, uint32_t saddr, uint32_t regaddr)
{
	std::vector<uint32_t> regval;

	regval.push_back(0x80001234); 	//request ID
	regval.push_back(saddr);		//subaddr
	regval.push_back(0xbbaaffff);	
	regval.push_back(0xffffffff);	//read list
	regval.push_back(regaddr);		//register addr

	int rc_len = sendSRSUDPpacket(ip, port, &regval);

	return(ntohl(buffer[5]));
}

int getSRSregisterpage(string ip, uint32_t port, uint32_t saddr, uint32_t offset, uint32_t number)
{
	int i;
	std::vector<uint32_t> regval;

	regval.push_back(0x80001234); 	//request ID
	regval.push_back(saddr);		//subaddr
	regval.push_back(0xbbaaffff);	
	regval.push_back(0xffffffff);	//read list

	for (i = offset; i < (offset+number); i++)
	{
		regval.push_back(i); //generate list
	}

	int rc_len = sendSRSUDPpacket(ip, port, &regval);

	for(i = 0; i < number; i++)
	{
		dataarray[i] = ntohl(buffer[5+(i*2)]); 
	}	

	return(0);
}
int sendSRSUDPpacket(string ip, uint32_t port, vector<uint32_t>* regval){

	int s, rc, i;
	struct sockaddr_in ownAddr, targetAddr, respondAddr;
	socklen_t targetAddr_len, respondAddr_len;

	/* create socket */
	s = socket (AF_INET, SOCK_DGRAM, 0);

	if (s < 0)
	{
	printf ("Cannot open socket (%s) \n",
		strerror(errno));
	exit (EXIT_FAILURE);
	}

	/* Set timeout */
	struct timeval tv;
	tv.tv_sec = 0;
	tv.tv_usec = 100000;
	if (setsockopt(s, SOL_SOCKET, SO_RCVTIMEO,&tv,sizeof(tv)) < 0) {
		perror("Error configuring socket for timeout");
	}

	/* Configure Target */
	targetAddr.sin_family = AF_INET;
	inet_aton(ip.c_str(), &targetAddr.sin_addr);
	targetAddr.sin_port = htons (port);

	/* Answer sender */
	respondAddr.sin_family = AF_INET;
	inet_aton(ip.c_str(), &respondAddr.sin_addr);
	respondAddr.sin_port = htons (6007); //note different answer source port!

	/* sender */
	ownAddr.sin_family = AF_INET;
	ownAddr.sin_addr.s_addr = htonl (INADDR_ANY);
	ownAddr.sin_port = htons (6007);


	/* Bind */
	rc = bind ( s, (struct sockaddr *) &ownAddr, sizeof (ownAddr) );
	if (rc < 0) 
	{
		printf ("Could not bind port (%s)\n",
		strerror(errno));
	exit (EXIT_FAILURE);
	}

	//convert vector to array
	uint32_t temp[regval->size()];
	for(i = 0; i<regval->size(); i++)
	{
		temp[i]=htonl(regval->at(i));// printf("put 0x%x\n", (int)regval[i]);
	}

	//send!
	
	targetAddr_len = sizeof (struct sockaddr_in);
	rc = sendto (s, &temp, sizeof(temp), 0, (struct sockaddr *) &targetAddr, targetAddr_len);
	if (rc < 0) 
	{
		printf ("Send failed\n");
		close (s);
		exit (EXIT_FAILURE);
	}

	//printf ("Sent %i bytes\n", rc);

	//receive!
	respondAddr_len = sizeof (struct sockaddr_in);
	rc = recvfrom (s, buffer, sizeof(buffer), 0, (struct sockaddr *) &respondAddr, &respondAddr_len);

	if (rc < 0) 
	{
		printf ("Could not receive data from IP %s - check network and ping\n", ip.c_str());
		close (s);
		exit (EXIT_FAILURE);
	}

	//printf ("Received %i bytes\n", rc);

	close (s);

	if(ntohl(buffer[0])!=0x1234)
	{
		perror("\nWrong SRS Answer requestID!\n");
		return(-1);
	}

	return rc;
}

int receiveSRSUDPpacket(string ip, uint32_t port){

	int s, rc, i;
	struct sockaddr_in ownAddr, respondAddr;
	socklen_t respondAddr_len;

	/* create socket */
	s = socket (AF_INET, SOCK_DGRAM, 0);

	if (s < 0)
	{
	printf ("Cannot open socket (%s) \n",
		strerror(errno));
	exit (EXIT_FAILURE);
	}

	/* Set timeout */
	struct timeval tv;
	tv.tv_sec = 1;
	tv.tv_usec = 0;
	if (setsockopt(s, SOL_SOCKET, SO_RCVTIMEO,&tv,sizeof(tv)) < 0) {
		perror("Error configuring socket for timeout");
	}

	/* Answer sender */
	respondAddr.sin_family = AF_INET;
	inet_aton(ip.c_str(), &respondAddr.sin_addr);
	respondAddr.sin_port = htons (port); //note different answer source port!

	/* sender */
	ownAddr.sin_family = AF_INET;
	ownAddr.sin_addr.s_addr = htonl (INADDR_ANY);
	ownAddr.sin_port = htons (port);


	/* Bind */
	rc = bind ( s, (struct sockaddr *) &ownAddr, sizeof (ownAddr) );
	if (rc < 0) 
	{
		printf ("Could not bind port (%s)\n",
		strerror(errno));
	exit (EXIT_FAILURE);
	}

	//receive!
	respondAddr_len = sizeof (struct sockaddr_in);
	rc = recvfrom (s, buffer, sizeof(buffer), 0, (struct sockaddr *) &respondAddr, &respondAddr_len);

	if (rc < 0) 
	{
		printf ("Could not receive data from IP %s - check network and ping\n", ip.c_str());
		close (s);
		exit (EXIT_FAILURE);
	}

	//printf ("Received %i bytes\n", rc);

	close (s);

	return rc;
}
