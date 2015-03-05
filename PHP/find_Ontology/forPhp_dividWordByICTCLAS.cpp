/*
	Author: Paul Chen
	Date: 2014/03/19
	Target: Divide word and get POS tag by ICTCLAS
*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <iostream>
#include <string>
#include <map>
#include <vector>
#include <fstream>
#include "ICTCLAS50.h"

using namespace std;

string divideSentence(string sentence);

int main(int argc, char* argv[])
{
	//string INPUT_string;
	//string OUTPUT_PATH;
	
	
	vector<string> lawSeg;
	vector<string> lawSegBuf;
	map<string, int> wordPool; //<chWord, freq>
	map<string, int>::iterator iter;
	fstream fin, fout;
	char buf[65536];
	string tmpStr, title;
	map<string, int> wordSegLib;
	map<string, int>::iterator it;
	int i,j,k, pos1, pos2, lawCount;

	if(!ICTCLAS_Init())			  
	{	printf("Init fails\n");
		return -1;	
	}

//	unsigned int nItems=ICTCLAS_ImportUserDictFile("Data/userdict.txt",CODE_TYPE_UTF8);
//	ICTCLAS_SaveTheUsrDic();
//	cerr << nItems << " user-defined lexical entries added!" << endl;
	//Load File and Divide it
	//fin.open(INPUT_PATH.c_str(), ios::in);
	//fout.open(OUTPUT_PATH.c_str(), ios::out);
	std::string INPUT_string = argv[1];
	//cout<<"Enter the sentence:";
	//getline (argv[1],INPUT_string);
	//cout<<argv[1];
	
	//lawCount = 0;
	/*while(!fin.eof()){//For each Law
		fin.getline(buf, 65536);
		tmpStr.assign(buf);
		if(tmpStr.length() < 3){break;}
		lawCount++;
		//Regualar case
		tmpStr = divideSentence(buf);
		cout << tmpStr << endl;
	}*/
	//fin.close();
	//fout.close();
    tmpStr = divideSentence(INPUT_string);
    cout << tmpStr << endl;


	//cerr << "Total has " << lawCount << " laws" << endl;
	ICTCLAS_Exit();
	return 0;
}

string divideSentence(string sentence){
	int nPaLen=sentence.length();
	char* sRst=0;
	int nRstLen=0;
	string result;
	sRst=(char *)malloc(nPaLen*6);
	nRstLen=ICTCLAS_ParagraphProcess(sentence.c_str(),nPaLen,sRst ,CODE_TYPE_UTF8,1);
	result.assign(sRst);
	free(sRst);
	return result;
}
