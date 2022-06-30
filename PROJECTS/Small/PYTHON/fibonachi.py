# create series of fibonachi using recursion and dynamic programming

# recursive function
def fibonachi_recursive(n):
    if n == 0:
        return 0
    elif n == 1:
        return 1
    else:
        return fibonachi_recursive(n-1) + fibonachi_recursive(n-2)

# dynamic programming function
def fibonachi_dynamic(n):
    fib = [0, 1]
    for i in range(2, n+1):
        fib.append(fib[i-1] + fib[i-2])
    return fib[n]

# main function
def main():
    n = int(input("Enter the number of fibonachi numbers: "))
    print("Recursive: ", fibonachi_recursive(n))
    print("Dynamic: ", fibonachi_dynamic(n))

# call main function
if __name__ == "__main__":
    main()

# output
# Enter the number of fibonachi numbers: 10
# Recursive:  55
# Dynamic:  55
# Enter the number of fibonachi numbers: 20
# Recursive:  6765
# Dynamic:  6765
# Enter the number of fibonachi numbers: 30
# Recursive:  832040
# Dynamic:  832040
# Enter the number of fibonachi numbers: 40
# Recursive:  102334155
# Dynamic:  102334155