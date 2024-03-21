#!/usr/bin/python3

print("Content-type: text/html")
print("")

print("Managing Code - Part 2<br>")



class Game:
    def __init__(self):
        self.nums = []
        
    def startGame(self):
        print("We are starting Now...<br>")

    def addNums(self, num):
        self.nums.append(num)


    def printNums(self):
        print("List of numbers: ", self.nums)


theGame = Game()
theGame.startGame()


# Adding numbers
for i in range(1000):
    theGame.addNums(i)


theGame.printNums()