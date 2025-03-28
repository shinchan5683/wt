import pandas as pd
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression

# Create dataset
df = pd.DataFrame({'Level': [10, 9, 8, 7, 6], 'Salary': [100000, 80000, 60000, 50000, 30000]})
X, y = df[['Level']], df['Salary']

# Split data (70% training, 30% testing)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Print training and testing sets
print("Training set:\n", X_train, "\n", y_train)
print("Testing set:\n", X_test, "\n", y_test)

# Train the model
model = LinearRegression().fit(X_train, y_train)

# Plot regression line
plt.scatter(X, y, color='red')
plt.plot(X, model.predict(X), color='blue')
plt.title("Position Salaries - Regression Line")
plt.xlabel("Level")
plt.ylabel("Salary")
plt.show()
