import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules

# User input dataset
dataset = [
    ["Bread", "Milk"],
    ["Bread"],
    ["Milk", "Diaper", "Beer", "Coke"],
    ["Bread", "Milk", "Diaper", "Beer"],
    ["Bread", "Milk", "Diaper", "Coke"],
    ["Diaper", "Beer", "Eggs"]
]

# Convert dataset into a DataFrame with one-hot encoding
unique_items = sorted(set(item for transaction in dataset for item in transaction))
df = pd.DataFrame([{item: (item in transaction) for item in unique_items} for transaction in dataset])

# Apply Apriori algorithm to find frequent itemsets
frequent_itemsets = apriori(df, min_support=0.2, use_colnames=True)

# Generate association rules from the frequent itemsets
rules = association_rules(frequent_itemsets, metric="lift", min_threshold=1.0)

# Display results
print("Frequent Itemsets:\n", frequent_itemsets)
print("\nAssociation Rules:\n", rules)
