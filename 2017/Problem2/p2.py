#!/bin/env python

def maxDiff(arr):
    least = None
    greatest = None
    for i in arr:
        if(least is None or least > i):
            least = i
        if(greatest is None or greatest < i):
            greatest = i
    return greatest - least

with open('input.txt') as fp:
    for line in iter(fp.readline, ''):
        print(','.join(line.split('\t')))
        print(maxDiff(line.split('\t')))