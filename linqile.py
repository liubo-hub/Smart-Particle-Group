import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import mean_squared_error, mean_absolute_error
import joblib
import sys

num1 = int(sys.argv[1])
num2 = int(sys.argv[2])
num3 = int(sys.argv[3])
num4 = int(sys.argv[4])
num5 = int(sys.argv[5])
num6 = int(sys.argv[6])
num7 = int(sys.argv[7])
num8 = int(sys.argv[8])
num9 = int(sys.argv[9])

path = r'D:\ParcharmPlace\Smart-Particle-Group\linqile\practice_data_2023_07_06.csv'
file = r'D:\ParcharmPlace\Smart-Particle-Group\linqile\practice_data_2023_07_06.csv'
data = pd.read_csv(file)

X = data[['x10', 'x50', 'x90', 'a10', 'a50', 'a90', 's10', 's50', 's90']]
y = data[['FFc']]

from sklearn.model_selection import cross_val_score, train_test_split

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.25, random_state = 45, shuffle = True)
RF = RandomForestRegressor().fit(X_train, y_train.values.ravel())
#print(X_test.shape)
y_predict = RF.predict(X_test)

# save
joblib.dump(RF, r'D:\ParcharmPlace\Smart-Particle-Group\linqile\model')

model = joblib.load(r'D:\ParcharmPlace\Smart-Particle-Group\linqile\model')

###input your size, sphericity, aspect ratio here
Result = model.predict([[num1,num2,num3,num4,num5,num6,num7,num8,num9]])
# print(Result)

plt.figure(1)
plt.plot(range(28), y_predict, "b^",label="predicted value")
plt.plot(range(28),y_test,"r*",label="true value")
plt.plot(14,Result,"gp",label="Your Result",markersize=12)
plt.text(14, Result, Result,fontsize=12)
plt.ylabel("flowability")
plt.xlabel("sample#")
plt.legend(loc="best")
plt.title("RandomForestRegressor")
#print(y_predict.shape,y_test.shape)
plt.tight_layout()
chart_file = 'linqileImages/plot.png'
plt.savefig(chart_file, format='png')