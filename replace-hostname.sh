#!/bin/sh

if [ $1 ==  ] 2> /dev/null;
then
	echo "Error: argument needed"
fi

find public nginx -name '*' -exec sed -i -e "s/your-domain.tld/$1/g" {} \;