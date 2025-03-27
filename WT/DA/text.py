import re
import nltk
from collections import Counter
import matplotlib.pyplot as plt
from wordcloud import WordCloud
from nltk.sentiment import SentimentIntensityAnalyzer

# Download stopwords from NLTK
nltk.download('stopwords', quiet=True)
# Load stopwords
STOP_WORDS = set(nltk.corpus.stopwords.words('english'))

class TextProcessor:
    def __init__(self, text):  # Initialize with input text
        self.text = text.lower()

    def preprocess(self):  # Remove special characters and digits (S16, S17, S23, S26)
        return re.sub(r'[^a-zA-Z\s]', '', self.text)

    def remove_stopwords(self):  # Remove stopwords from text (S18, S20, S22)
        return ' '.join(w for w in self.preprocess().split() if w not in STOP_WORDS)

    def tokenize(self):  # Tokenize text into words and sentences (S18)
        return self.preprocess().split(), self.text.split('. ')

    def word_frequency(self):  # Calculate word frequency distribution (S18)
        return Counter(self.remove_stopwords().split())

    def plot_frequency(self, top_n=10):  # Plot the frequency distribution of words (S18)
        freq_dist = self.word_frequency().most_common(top_n)
        plt.figure(figsize=(10, 5))
        plt.bar(*zip(*freq_dist))
        plt.xticks(rotation=45)
        plt.title('Word Frequency Distribution')
        plt.show()

    def plot_wordcloud(self):  # Generate and display a word cloud (S18)
        plt.figure(figsize=(10, 5))
        plt.imshow(WordCloud(width=800, height=400, background_color='white').generate(self.remove_stopwords()), interpolation='bilinear')
        plt.axis("off")
        plt.show()

    def extractive_summary(self, num_sentences=2):  # Generate extractive summary (S16, S17, S26)
        sentences = self.text.split('. ')
        word_freq = self.word_frequency()
        scores = {s: sum(word_freq.get(w, 0) for w in s.split()) for s in sentences}
        return '. '.join(sorted(scores, key=scores.get, reverse=True)[:num_sentences])

# Example usage
def main():
    text = """Hello all, Welcome to Python Programming Academy.
    Python Programming Academy is a nice platform to learn new programming skills.
    It is difficult to get enrolled in this Academy."""
    processor = TextProcessor(text)

    print("Preprocessed:", processor.preprocess())
    print("\nNo Stopwords:", processor.remove_stopwords())
    print("\nTokens:", processor.tokenize())
    print("\nFrequencies:", dict(processor.word_frequency()))
    print("\nSummary:", processor.extractive_summary())

    processor.plot_frequency()
    processor.plot_wordcloud()
    #Slip 19, 25
    nltk.download('vader_lexicon')
    sia=SentimentIntensityAnalyzer()
    msg="I take a tired walk everyday"
    sentiment_scores=sia.polarity_scores(msg)
    if sentiment_scores['compound'] >= 0.05 :
        sentiment="Positive"
    elif sentiment_scores['compound'] <= - 0.05 :
        sentiment="Negative"
    else :
        sentiment="Neutral"
    print(f"msg : {msg}")
    print(f"sentiment : {sentiment_scores}")
    print(f"sentiment : {sentiment}")
if __name__ == "__main__":  # Entry point for execution
    main()
