CC = g++
CFLAGS = /home/tutu/ICTCLAS_API/libICTCLAS50.so -O2 -std=c++0x -m32 -DOS_LINUX
CppFLAGS = -I /home/tutu/ICTCLAS_API/libICTCLAS50.so -O2 -std=c++0x -m32 -DOS_LINUX

main: dividWordByICTCLAS.cpp ICTCLAS50.h
	${CC} /home/tutu/ICTCLAS_API/dividWordByICTCLAS.cpp ${CFLAGS} -o /home/tutu/ICTCLAS_API/dividWordByICTCLAS.o
forphp: forPhp_dividWordByICTCLAS.cpp ICTCLAS50.h
	${CC} /home/tutu/ICTCLAS_API/forPhp_dividWordByICTCLAS.cpp ${CFLAGS} -o /home/tutu/ICTCLAS_API/forPhp_dividWordByICTCLAS.o
addWordTag: addWordTag.cpp ICTCLAS50.h
	${CC} addWordTag.cpp ${CFLAGS} -o addWordTag.o
clear:
	rm *.o
