import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score, classification_report
from sklearn import datasets

def train_and_visualize(X, y, dataset_name):
    """Trains logistic regression model and visualizes the results."""
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)
    model = LogisticRegression(max_iter=200).fit(X_train, y_train)
    y_pred = model.predict(X_test)

    print(f"\n{dataset_name} Accuracy: {accuracy_score(y_test, y_pred):.2f}")
    print("Classification Report:\n", classification_report(y_test, y_pred))

    if X.shape[1] == 2:  # 2D dataset decision boundary visualization
        x_min, x_max = X.iloc[:, 0].min()-1, X.iloc[:, 0].max()+1
        y_min, y_max = X.iloc[:, 1].min()-1, X.iloc[:, 1].max()+1
        xx, yy = np.meshgrid(np.linspace(x_min, x_max, 200), np.linspace(y_min, y_max, 200))
        Z = model.predict(np.c_[xx.ravel(), yy.ravel()]).reshape(xx.shape)

        plt.figure(figsize=(7, 5))
        plt.contourf(xx, yy, Z, alpha=0.3, cmap="coolwarm")
        sns.scatterplot(x=X.iloc[:, 0], y=X.iloc[:, 1], hue=y, palette="coolwarm", edgecolor="k")
        plt.title(f"{dataset_name} - Decision Boundary")
        plt.show()
    else:  # Multi-dimensional dataset pair plot
        sns.pairplot(pd.concat([X, y.rename('Target')], axis=1), hue='Target', palette="coolwarm")
        plt.suptitle(f"{dataset_name} - Feature Pair Plot", y=1.02)
        plt.show()


# 1. User Dataset
df_user = pd.DataFrame({
    'User ID': [1, 2, 3, 4, 5],
    'Gender': ['Male', 'Female', 'Male', 'Female', 'Male'],
    'Age': [22, 25, 30, 35, 40],
    'Estimated Salary': [20000, 25000, 40000, 60000, 80000],
    'Purchased': [0, 0, 1, 1, 1]
})
df_user['Gender'] = df_user['Gender'].map({'Male': 1, 'Female': 0})
train_and_visualize(df_user[['Age', 'Estimated Salary']], df_user['Purchased'], "User Dataset")

# 2. Iris Dataset - Statistical Summary & Logistic Regression
iris = datasets.load_iris()
df_iris = pd.DataFrame(iris.data, columns=iris.feature_names)
df_iris['species'] = iris.target
print("\nIris Dataset - Statistical Summary\n", df_iris.groupby('species').describe())
train_and_visualize(df_iris.iloc[:, [0, 2]], df_iris['species'], "Iris Dataset")

# 3. Student Score Dataset
df_student = pd.DataFrame({
    'Hours Studied': range(1, 11),
    'Previous Scores': [40, 50, 60, 55, 70, 75, 80, 85, 90, 95],
    'Pass': [0, 0, 1, 0, 1, 1, 1, 1, 1, 1]
})
train_and_visualize(df_student[['Hours Studied', 'Previous Scores']], df_student['Pass'], "Student Score Dataset")
