#include <stdio.h>
#include <stdlib.h>
#include "mongoose.h"

int memoria(char *b, size_t n){
	system("df");//comando df para mostrar memória livre
}

int main(int argc, char **argv) {
   	fprintf(stdout, "EC8TOP 23-10-14\n");
	char buffer[100];
	memoria(buffer,100);
	return EXIT_SUCCESS;
}


