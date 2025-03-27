import re
import nltk
from collections import Counter
import matplotlib.pyplot as plt
from wordcloud import WordCloud

nltk.download('stopwords', quiet=True)
STOP_WORDS = set(nltk.corpus.stopwords.words('english'))

class TextProcessor:
    def __init__(self, text):
        self.text = text.lower()

    def preprocess(self):
        return re.sub(r'[^a-zA-Z\s]', '', self.text)

    def remove_stopwords(self):
        return ' '.join(word for word in self.preprocess().split() if word not in STOP_WORDS)

    def tokenize(self):
        words = self.preprocess().split()
        sentences = self.text.split('. ')
        return words, sentences

    def word_frequency(self):
        return Counter(self.remove_stopwords().split())

    def plot_frequency(self, top_n=10):
        freq_dist = self.word_frequency().most_common(top_n)
        plt.figure(figsize=(10, 5))
        plt.bar(*zip(*freq_dist))
        plt.xticks(rotation=45)
        plt.title('Word Frequency Distribution')
        plt.show()

    def plot_wordcloud(self):
        plt.figure(figsize=(10, 5))
        plt.imshow(WordCloud(width=800, height=400, background_color='white').generate(self.remove_stopwords()), interpolation='bilinear')
        plt.axis("off")
        plt.show()

    def extractive_summary(self, num_sentences=2):
        sentences = self.text.split('. ')
        word_freq = self.word_frequency()
        scores = {s: sum(word_freq.get(w, 0) for w in s.split()) for s in sentences}
        return '. '.join(sorted(scores, key=scores.get, reverse=True)[:num_sentences])

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

if __name__ == "__main__":
    main()