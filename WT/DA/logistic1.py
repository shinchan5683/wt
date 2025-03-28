import pandas as pd
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score

# Create dataset
df = pd.DataFrame({
    'User ID': [101, 102, 103, 104, 105],
    'Gender': ['Male', 'Female', 'Male', 'Female', 'Male'],
    'Age': [22, 25, 30, 35, 40],
    'Estimated Salary': [20000, 50000, 60000, 80000, 100000],
    'Purchased': [0, 0, 1, 1, 1]
})

# Encode categorical variable
df['Gender'] = LabelEncoder().fit_transform(df['Gender'])

# Define independent (X) and target (y) variables
X = df[['Gender', 'Age', 'Estimated Salary']]
y = df['Purchased']

# Split data (70% training, 30% testing)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# Train logistic regression model
model = LogisticRegression().fit(X_train, y_train)

# Make predictions and evaluate
y_pred = model.predict(X_test)
print("Accuracy:", accuracy_score(y_test, y_pred))

# Scatter plot to visualize purchases
plt.scatter(df['Age'], df['Estimated Salary'], c=df['Purchased'], cmap='coolwarm', edgecolors='k')
plt.xlabel("Age")
plt.ylabel("Estimated Salary")
plt.title("User Purchase Distribution")
plt.show()
