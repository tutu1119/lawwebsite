#include <iostream>
#include <fstream>
#include <string.h>
#include <sys/types.h>
#include <regex.h>
#include <stdio.h>
using namespace std;

#define size 5120
string rule[50];
string law[50];
void cutfuntion(char *filename,string des[]);
int main()
{
	string r_file = "rule.csv";
	string l_file = "law.csv";
	
	regex_t regex;
	int reti;
	
	//string to char*
	char *r_filename;
	r_filename = new char[r_file.length()];
	strcpy(r_filename,r_file.c_str());
	
	char *l_filename;
	l_filename = new char[l_file.length()];
	strcpy(l_filename,l_file.c_str());
	//接規則和資料
	cutfuntion(r_filename,rule);
	cutfuntion(l_filename,law);

	/* Compile regular expression */
		/*string a="^稱['.*，為']";
		string b="稱*發行人*，謂[募集及發行有價證券之公司]，或募集有價證券之發人]。";*/
		cout<<"r[]="<<rule[0]<<endl;
		cout<<"l[]="<<law[0]<<endl;				
		
        reti = regcomp(&regex, rule[0].c_str(), 0);
        if( reti ){ fprintf(stderr, "Could not compile regex\n"); }	
	/* Execute regular expression */
        reti = regexec(&regex, law[0].c_str(), 0, NULL, 0);
        if( !reti )
		{
                cout<<"Match\n";
        }
	    else if( reti == REG_NOMATCH )
		{
                cout<<"No match\n";
        }

		//cout<<"r[]="<<rule[0]<<endl;
		//cout<<"l[]="<<law[0]<<endl;
	
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
			//cout<<des[count]<<endl;
            count++;
            pch = strtok(NULL,",");
        }
        file.close();
    }
}
