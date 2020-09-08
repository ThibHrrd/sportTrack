import os,sys

if len(sys.argv) != 2:
	print("1 argument required")
else:
	os.system("git pull")
	os.system("git add * ")
	os.system("git commit -m "+sys.argv[1])
	os.system("git push")
	print ("sexe")
