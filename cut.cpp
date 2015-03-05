#include <iostream>
#include <fstream>
#include <string.h>
#include <sys/types.h>
#include <regex.h>
#include <stdio.h>
using namespace std;

#define size 5120
string rule[50];
void cutfuntion(char *filename,string des[]);
int main()
{
	
	//char *filename = "rule.csv";
	string r_file ="rule.csv";
	char *filename;
	filename = new char[r_file.length()];
	strcpy(filename,r_file.c_str());
	cutfuntion(filename,rule);
	cout<<"des[]="<<rule[0]<<endl;
	return 0;
}
void cutfuntion(char *filename,string des[])
{
	fstream file;
    char temp[size];
    char *pch;
    string convert;
    int count = 0;

    file.open(filename,ios::in);
    if(!file)
        cout<<"檔案無法開啟\n";
    else
    {
        file.read(temp,sizeof(temp)); //一次全部讀進來
        pch = strtok(temp,",");
        while(pch != NULL)
        {
            //cout<<pch<<endl;
            convert.assign(pch); //To string
            des[count]=convert;            
            count++;
            pch = strtok(NULL,",");
        }
        file.close();
    }
}