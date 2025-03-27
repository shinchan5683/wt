import re

# Sample text paragraph
text = """Hello123! This is a sample text with special characters: @#$%^&* and numbers 456789. 
We will remove all special characters and digits from this text to make it clean.
The date is 2023-12-25, and the temperature is 25°C."""

# Function to remove special characters and digits
def preprocess_text(text):
    # Remove special characters and digits
    cleaned_text = re.sub(r'[^a-zA-Z\s]', '', text)
    # Remove extra whitespace
    cleaned_text = ' '.join(cleaned_text.split())
    return cleaned_text

# Print original and preprocessed text
print('Original text:')
print(text)

print('\nPreprocessed text (removed special characters and digits):')
preprocessed_text = preprocess_text(text)
print(preprocessed_text)

# Print statistics
print('\nStatistics:')
print(f'Original text length: {len(text)}')
print(f'Preprocessed text length: {len(preprocessed_text)}')
print(f'Characters removed: {len(text) - len(preprocessed_text)}')