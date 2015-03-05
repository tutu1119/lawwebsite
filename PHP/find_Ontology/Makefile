CC = g++
CFLAGS = /home/tutu/PHP/find_Ontology/libICTCLAS50.so -O2 -std=c++0x -m32 -DOS_LINUX

main: dividWordByICTCLAS.cpp ICTCLAS50.h
	${CC} dividWordByICTCLAS.cpp ${CFLAGS} -o dividWordByICTCLAS.o
forphp: forPhp_dividWordByICTCLAS.cpp ICTCLAS50.h
	${CC} forPhp_dividWordByICTCLAS.cpp ${CFLAGS} -o forPhp_dividWordByICTCLAS.o
addWordTag: addWordTag.cpp ICTCLAS50.h
	${CC} addWordTag.cpp ${CFLAGS} -o addWordTag.o
clear:
	rm *.o
