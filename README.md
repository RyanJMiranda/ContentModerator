# Content Moderator


🚀 Content Moderator is a powerful PHP package designed to help developers moderate content effortlessly. Whether you're filtering profanity, spam, or other unwanted text, this package provides a flexible and extensible solution for all your content moderation needs.


---

## Features

- 🔥 Profanity Filtering: Detect and replace offensive words with customizable replacement characters.
- 📖 Dictionaries: Use built-in dictionaries like ProfanityDictionary or create your own custom dictionaries.
- 🛠️ Extensible Filters: Easily add new filters for spam, keywords, or other types of content.
- 🌟 Customizable Replacement: Replace bad words with any character or pattern you choose.
- 🧩 Modular Design: Built with interfaces and abstract classes for maximum flexibility and extensibility.
- ✅ PSR-4 Autoloading: Fully compliant with modern PHP standards.

---

## Installation


Install the package via Composer (coming soon):

	composer require ryanjmiranda/content-moderator


---

## Usage

### Basic Profanity Filtering


Filter profanity from a string using the default ProfanityDictionary:


	use RyanJMiranda\ContentModerator\StringFilters\ProfanityFilter;
	use RyanJMiranda\ContentModerator\Dictionaries\ProfanityDictionary;
	
	$dictionary = new ProfanityDictionary();
	$filter = new ProfanityFilter($dictionary);
	
	$content = "This is a fucking example.";
	$result = $filter->apply($content);
	
	echo $result; // Output: "This is a ******* example."

### Custom Replacement Character


Replace bad words with a custom character:


	$filter->setReplacementCharacter('#');
	
	$content = "This is a fucking example.";
	$result = $filter->apply($content);
	
	echo $result; // Output: "This is a ####### example."

### Strict Profanity Filtering


Use the StrictProfanityDictionary for more aggressive filtering:


	use RyanJMiranda\ContentModerator\Dictionaries\StrictProfanityDictionary;
	
	$strictDictionary = new StrictProfanityDictionary();
	$filter = new ProfanityFilter($strictDictionary);
	
	$content = "This is a fucking example.";
	$result = $filter->apply($content);
	
	echo $result; // Output: "This is a ******* example."


---

### Extending the Package

Create a Custom Dictionary


You can create your own dictionary by extending the StringDictionary class:


	use RyanJMiranda\ContentModerator\Dictionaries\StringDictionary;
	
	class CustomDictionary extends StringDictionary
	{
	    protected array $words = [
	        'customword1',
	        'customword2',
	    ];
	}

### Add a New Filter


Create a new filter by extending the StringFilter abstract class:


	use RyanJMiranda\ContentModerator\StringFilters\StringFilter;
	
	class SpamFilter extends StringFilter
	{
	    public function apply($content): string
	    {
	        $spamWords = ['http://', 'www.'];
	        foreach ($spamWords as $word) {
	            $replacement = str_repeat($this->getReplacementCharacter(), mb_strlen($word));
	            $content = str_ireplace($word, $replacement, $content);
	        }
	        return $content;
	    }
	}


---

## Testing


Run the tests using PHPUnit:


	vendor/bin/phpunit

Example Test

	use PHPUnit\Framework\TestCase;
	use RyanJMiranda\ContentModerator\StringFilters\ProfanityFilter;
	use RyanJMiranda\ContentModerator\Dictionaries\ProfanityDictionary;
	
	class ProfanityFilterTest extends TestCase
	{
	    public function testProfanityFilterReplacesBadWords()
	    {
	        $dictionary = new ProfanityDictionary();
	        $filter = new ProfanityFilter($dictionary);
	
	        $content = "This is a fucking example.";
	        $result = $filter->apply($content);
	
	        $this->assertEquals("This is a ******* example.", $result);
	    }
	}


---

## Contributing


We welcome contributions to make Content Moderator even better! Feel free to:


- Submit bug reports or feature requests.
- Fork the repository and submit pull requests.
- Share ideas for new filters or dictionaries.

---

## License


This project is licensed under the MIT License. See the LICENSE file for details.


---

## Future Plans

- 🧠 AI Integration: Use AI models for sentiment analysis and advanced content moderation.
- 🖼️ Image Moderation: Detect inappropriate content in images.
- 📂 File Moderation: Scan files for viruses, metadata, and unwanted content.
- 🛡️ Database-Driven Filters: Allow users to manage filters via a database.

---

## About


Created with ❤️ by Ryan Miranda. This package is designed to make content moderation simple, flexible, and fun for PHP developers.
