/*
	Author: Paul Chen
	Date: 2014//
	Target: 
*/
#include <iostream>
#include <cstdlib>
#include <string>
#include <cstring>
#include <fstream>
#include <sstream>
#include <map>
#include <vector>
#include <iterator>
#include <algorithm>
#include <math.h>
#include <sys/types.h>
#include <dirent.h>
#include <errno.h>
#include <thread>
#include <mutex>
#include <regex.h>

using namespace std;

//Get all file name in director
int getdir(string dir, vector<string> &files);
//Count the total line in file
int countFileLine(string filePath);
//integer to string
string int2str(int &i);
//double to string
string double2str(double &i);
//string to int
int str2int(string str);
//Divide Sentence base on flag character
int explode(char divideChar, string originalString, vector<string> &stringAry);
int explode(string divideStr, string originalString, vector<string> &stringAry);
//Remove whitespace in the head/tail
string trim(const string& str);
//Replace all sub_string
string strReplaceAll(string sources, string originStr, string targetStr);
//Merge word sequence by particular word
string mergeSequence(string mergeSeq, vector<string> wordSeq);
//String to lower
string strToLower(string str);
//Load file to vector<string> without any process
bool loadFile(string filename, vector<string> &container);
//Load file to map<string, int> without any process
bool loadFile(string filename, map<string, int> &container);
//Get Mutual information
double getMutualInformation(int totalNumber, int partA, int partB, int partAB);
//Get Correlation coefficient
double getCorrelationCoefficient(int totalNumber, int partA, int partB, int partAB);
//Get Correlation coefficient
double getLikehoodRatios(int totalNumber, int partA, int partB, int partAB);
//Get L Value: L(k,n,x) = x^k(1-x)^(n-k)
double getLValue(double k,double n,double x);
//Get Dice Coefficient
double getDice(int totalNumber, int partA, int partB, int partAB);
