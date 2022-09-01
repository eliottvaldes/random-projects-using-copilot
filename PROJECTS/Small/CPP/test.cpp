// Postfix operation program in C++
// Using a stack and a list to solve the problems

#include <iostream>


class stack
{
    int top;
    int size;
    int *arr;
    public: stack(int size)
    {
        this->size = size;
        top = -1;
        arr = new int[size];
    }
    void push(int x)
    {
        if(top == size - 1)
        {
            std::cout<<"Stack is full\n";
            return;
        }
        top++;
        arr[top] = x;
    }
    int pop()
    {
        if(top == -1)
        {
            std::cout<<"Stack is empty\n";
            return -1;
        }
        int x = arr[top];
        top--;
        return x;
    }
    int peek()
    {
        if(top == -1)
        {
            std::cout<<"Stack is empty\n";
            return -1;
        }
        return arr[top];
    }
    bool isEmpty()
    {
        if(top == -1)
            return true;
        return false;
    }
    bool isFull()
    {
        if(top == size - 1)
            return true;
        return false;
    }
};

class queue
{
    int front;
    int rear;
    int size;
    int *arr;
    public: queue(int size)
    {
        this->size = size;
        front = -1;
        rear = -1;
        arr = new int[size];
    }
    void enqueue(int x)
    {
        if(rear == size - 1)
        {
            std::cout<<"Queue is full\n";
            return;
        }
        if(front == -1)
            front = 0;
        rear++;
        arr[rear] = x;
    }
    int dequeue()
    {
        if(front == -1)
        {
            std::cout<<"Queue is empty\n";
            return -1;
        }
        int x = arr[front];
        if(front == rear)
            front = rear = -1;
        else
            front++;
        return x;
    }
    int peek()
    {
        if(front == -1)
        {
            std::cout<<"Queue is empty\n";
            return -1;
        }
        return arr[front];
    }
    bool isEmpty()
    {
        if(front == -1)
            return true;
        return false;
    }
    bool isFull()
    {
        if(rear == size - 1)
            return true;
        return false;
    }
};

int postfix(std::string str)
{
    stack s(str.length());
    for(int i = 0; i < str.length(); i++)
    {
        if(str[i] >= '0' && str[i] <= '9')
            s.push(str[i] - '0');
        else
        {
            int val1 = s.pop();
            int val2 = s.pop();
            switch(str[i])
            {
                case '+':
                    s.push(val2 + val1);
                    break;
                case '-':
                    s.push(val2 - val1);
                    break;
                case '*':
                    s.push(val2 * val1);
                    break;
                case '/':
                    s.push(val2 / val1);
                    break;
            }
        }
    }
    return s.pop();
}

int main()
{
    std::string str;
    std::cout<<"Enter the postfix expression: ";
    std::cin>>str;
    std::cout<<"The result is: "<<postfix(str);
    return 0;
}