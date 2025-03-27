import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression

# Function to build and train a linear regression model
def train_linear_regression(X, y, dataset_name):
    # Split data into 70% training and 30% testing
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

    # Train the model
    model = LinearRegression().fit(X_train, y_train)
    
    # Print training and testing sets
    print(f"\nDataset: {dataset_name}")
    print("Training set:\n", X_train, "\n", y_train)
    print("Testing set:\n", X_test, "\n", y_test)
    
    # Plot regression line if possible
    if X.shape[1] == 1:  # Only for single-variable regression
        plt.scatter(X, y, color='red')
        plt.plot(X, model.predict(X), color='blue')
        plt.title(f"{dataset_name} - Regression Line")
        plt.xlabel("Independent Variable")
        plt.ylabel("Target Variable")
        plt.show()

    return model

# 1. Position Salaries Dataset
df1 = pd.DataFrame({'Level': [10, 9, 8, 7, 6], 'Salary': [100000, 80000, 60000, 50000, 30000]})
X1, y1 = df1[['Level']], df1['Salary']
train_linear_regression(X1, y1, "Position Salaries")

# 2. Salary Dataset
df2 = pd.DataFrame({'Experience': [1, 2, 3, 4, 5], 'Salary': [20000, 25000, 40000, 60000, 80000]})
X2, y2 = df2[['Experience']], df2['Salary']
train_linear_regression(X2, y2, "Salary Dataset")

# 3. Fish Species Weight Prediction
df3 = pd.DataFrame({'Length': [10, 20, 30, 40, 50], 'Weight': [100, 200, 300, 400, 500]})
X3, y3 = df3[['Length']], df3['Weight']
train_linear_regression(X3, y3, "Fish Species Weight")

# 4. Heights and Weights Dataset
df4 = pd.DataFrame({'Height': [150, 160, 170, 180, 190], 'Weight': [50, 60, 70, 80, 90]})
X4, y4 = df4[['Height']], df4['Weight']
train_linear_regression(X4, y4, "Heights and Weights")

# 5. Nursery Dataset (Dummy Data as UCI data needs to be downloaded separately)
df5 = pd.DataFrame({'Factor': [1, 2, 3, 4, 5], 'Decision': [0, 1, 1, 0, 1]})
X5, y5 = df5[['Factor']], df5['Decision']
train_linear_regression(X5, y5, "Nursery Dataset")

# 6. User Data
df6 = pd.DataFrame({'Age': [22, 25, 30, 35, 40], 'Purchases': [1, 3, 4, 5, 6]})
X6, y6 = df6[['Age']], df6['Purchases']
train_linear_regression(X6, y6, "User Data")

# 7. Car Dataset
df7 = pd.DataFrame({'Engine_Size': [1.2, 1.6, 2.0, 2.5, 3.0], 'Price': [10000, 15000, 20000, 25000, 30000]})
X7, y7 = df7[['Engine_Size']], df7['Price']
train_linear_regression(X7, y7, "Car Dataset")