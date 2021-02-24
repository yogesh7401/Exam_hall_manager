n=int(input("Enter the limit:"))
list=[]
print("Enter the element one by one")
for i in range(0,n):
    x=int(input())
    list.append(x)
key=int(input("Which element to search:"))
count=0
for i in range(0,n):
    if(key==list[i]):
        count=i+1
if(count!=0):
    print("Element found at position : %d" %count)
else:
    print("Element not found")