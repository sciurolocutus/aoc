#!/bin/env python

def maxDiff(arr):
    least = None
    greatest = None
    for i in arr:
        i = int(i)
        if(least is None or least > i):
            least = i
        if(greatest is None or greatest < i):
            greatest = i
    return greatest - least

def p1(infile):
    sumOfDiffs = 0
    for line in iter(infile.readline, ''):
        print(','.join(line.split('\t')))
        d = maxDiff(line.split('\t'))
        sumOfDiffs += d
        print('d: {}, s: {}'.format(d, sumOfDiffs))
        
    return sumOfDiffs

def dividendOfEvenDivision(arr):
    ar2 = sorted([int(x) for x in arr])
    for i in range(0, len(ar2)-1):
        divisor = int(ar2[i])
        for j in range(i+1, len(ar2)):
            dividend = int(ar2[j])
            print('testing {} % {}'.format(divisor, dividend))
            if(dividend % divisor == 0):
                quotient = dividend / divisor
                print('{} divides {} into {} equal parts'.format(divisor, dividend, quotient))
                return quotient
    print('nothing divides anything')
    print(','.join([str(x) for x in ar2]))
    return 0

def p2(infile):
    sumOfDividends = 0
    for line in iter(infile.readline, ''):
        sumOfDividends += dividendOfEvenDivision(line.split('\t'))
    return sumOfDividends

with open('input.txt') as fp:
    print(p2(fp))
    #p1(fp)