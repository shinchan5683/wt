import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression

# Create simple User dataset
data = {
    'Age': [25, 30, 35, 40, 45, 50, 55, 60, 65, 70],
    'Income': [30000, 45000, 50000, 60000, 70000, 80000, 90000, 100000, 110000, 120000],
    'SpendingScore': [40, 50, 55, 65, 70, 75, 80, 85, 90, 95]
}

# Create DataFrame
df = pd.DataFrame(data)

# Prepare features (X) and target (y)
X = df[['Age', 'Income']]
y = df['SpendingScore']

# Split data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Create and train the linear regression model
model = LinearRegression()
model.fit(X_train, y_train)

# Print model performance
print('Model Performance:')
print(f'R-squared score: {model.score(X_test, y_test):.4f}')

# Example prediction
new_user = np.array([[35, 55000]])
predicted_score = model.predict(new_user)[0]
print(f'\nPredicted spending score for new user (Age: 35, Income: $55,000): {predicted_score:.2f}')