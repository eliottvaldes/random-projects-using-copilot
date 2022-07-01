<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci example code</title>

    <link rel="stylesheet" type="text/css" href="assets/css/EnlighterJS.min.css" />
    <link rel="stylesheet" href="assets/css/fibonacci.css">
    <script type="text/javascript" src="assets/js/MooTools.min.js"></script>
    <script type="text/javascript" src="assets/js/EnlighterJS.min.js"></script>

    <!-- import link for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid my-5">
        <div class="container py-3">

            <div class="page-header p-3">
                <h1 align="center">
                    Fibonacci Series
                </h1>
            </div>

            <div id="content">
                <!-- create the script that importe the styles from library -->
                <script>
                    window.addEvent('domready', function () {
                        EnlighterJS.Util.Init('pre', 'code.special', {
                            infoButton: false,
                            windowButton: true,
                            rawButton: true,
                            // special hover class
                            hover: 'myHoverClass',

                            // default language
                            language: 'html',

                            // default theme
                            theme: 'classic',

                            // toolbar labels
                            toolbar: {
                                rawTitle: 'RAW Code',
                                windowTitle: 'New Window',
                                infoTitle: 'RL CODE'
                            }
                        });
                    });
                </script>
                
                <!-- container code -->
                <pre data-enlighter-language="python" data-enlighter-highlight="5">
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

                </pre>


            </div>

        </div>
    </div>

</body>

</html>