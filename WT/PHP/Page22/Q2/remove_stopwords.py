import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize

# Download required NLTK data
nltk.download('punkt')
nltk.download('stopwords')

# Sample text paragraph
text = """Natural language processing (NLP) is a subfield of linguistics, computer science, and artificial intelligence 
concerned with the interactions between computers and human language. The ultimate objective of NLP is to help 
computers understand, interpret and manipulate human language."""

# Tokenize the text
words = word_tokenize(text)

# Get English stopwords
stop_words = set(stopwords.words('english'))

# Remove stopwords
filtered_words = [word for word in words if word.lower() not in stop_words]

# Print original and filtered text
print('Original text:')
print(text)
print('\nText after removing stopwords:')
print(' '.join(filtered_words))

# Print statistics
print(f'\nNumber of words before removing stopwords: {len(words)}')
print(f'Number of words after removing stopwords: {len(filtered_words)}')
print(f'Number of stopwords removed: {len(words) - len(filtered_words)}')