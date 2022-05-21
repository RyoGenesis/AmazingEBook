<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ebooks = [
            ['title' => 'A Brief History of Time', 'author' => 'Stephen Hawking',
            'description' => 'In A Brief History of Time, Hawking writes in non-technical terms about the structure, origin, development and eventual fate of the Universe, which is the object of study of astronomy and modern physics. He talks about basic concepts like space and time, basic building blocks that make up the Universe (such as quarks) and the fundamental forces that govern it (such as gravity). He writes about cosmological phenomena such as the Big Bang and black holes. He discusses two major theories, general relativity and quantum mechanics, that modern scientists use to describe the Universe. Finally, he talks about the search for a unifying theory that describes everything in the Universe in a coherent manner.'] ,

            ['title' => 'No Longer Human', 'author' => 'Osamu Dazai',
            'description' => 'No Longer Human (人間失格, Ningen Shikkaku) is a 1948 Japanese novel by Osamu Dazai. It is considered Dazai\'s masterpiece and ranks as the second-best selling novel ever in Japan, behind Natsume Sōseki\'s Kokoro. The novel, narrated in first person, contains several elements which portray an autobiographical basis. The novel presents recurring themes in the author\'s life, including suicide, social alienation, and depression. Many believe the book to have been his will, as Dazai took his own life shortly after the last part of the book (which had appeared in serial form) was published.' ],
            
            ['title' => 'Clean Code: A Handbook of Agile Software Craftsmanship', 'author' => 'Robert C. Martin', 
            'description' => 'Noted software expert Robert C. Martin presents a revolutionary paradigm with Clean Code: A Handbook of Agile Software Craftsmanship. Martin has teamed up with his colleagues from Object Mentor to distill their best agile practice of cleaning code "on the fly" into a book that will instill within you the values of a software craftsman and make you a better programmer—but only if you work at it.\nClean Code is divided into three parts. The first describes the principles, patterns, and practices of writing clean code. The second part consists of several case studies of increasing complexity. Each case study is an exercise in cleaning up code—of transforming a code base that has some problems into one that is sound and efficient. The third part is the payoff: a single chapter containing a list of heuristics and "smells" gathered while creating the case studies. The result is a knowledge base that describes the way we think when we write, read, and clean code.'],
            
            ['title' => 'Code: The Hidden Language of Computer Hardware and Software', 'author' => 'Charles Petzold', 
            'description' => 'What do flashlights, the British invasion, black cats, and seesaws have to do with computers? In CODE, they show us the ingenious ways we manipulate language and invent new means of communicating with each other. And through CODE, we see how this ingenuity and our very human compulsion to communicate have driven the technological innovations of the past two centuries.
            Using everyday objects and familiar language systems such as Braille and Morse code, author Charles Petzold weaves an illuminating narrative for anyone who’s ever wondered about the secret inner life of computers and other smart machines.
            It’s a cleverly illustrated and eminently comprehensible story—and along the way, you’ll discover you’ve gained a real context for understanding today’s world of PCs, digital media, and the Internet. No matter what your level of technical savvy, CODE will charm you—and perhaps even awaken the technophile within.'],
            
            ['title' => 'The Undercover Economist', 'author' => 'Tim Harford',
            'description' => 'The Undercover Economist is for anyone who\'s wondered why the gap between rich and poor nations is so great, or why they can\'t seem to find a decent second-hand car, or how to outwit Starbucks. This book offers the hidden story behind these and other questions, as economist Tim Harford ranges from Africa, Asia, Europe, and of course the United States to reveal how supermarkets, airlines, and coffee chains--to name just a few--are vacuuming money from our wallets. Harford punctures the myths surrounding some of today\'s biggest controversies, including the high cost of health-care; he reveals why certain environmental laws can put a smile on a landlord\'s face; and he explains why some industries can have high profits for innocent reasons, while in other industries something sinister is going on. Covering an array of economic concepts including scarce resources, market power, efficiency, price gouging, market failure, inside information, and game theory, Harford sheds light on how these forces shape our day-to-day lives, often without our knowing it.'],
            
            ['title' => 'Dune', 'author' => 'Frank Herbert', 
            'description' => 'Dune is set in the distant future amidst a feudal interstellar society in which various noble houses control planetary fiefs. It tells the story of young Paul Atreides, whose family accepts the stewardship of the planet Arrakis. While the planet is an inhospitable and sparsely populated desert wasteland, it is the only source of melange, or "spice", a drug that extends life and enhances mental abilities. Melange is also necessary for space navigation, which requires a kind of multidimensional awareness and foresight that only the drug provides. As melange can only be produced on Arrakis, control of the planet is a coveted and dangerous undertaking. The story explores the multilayered interactions of politics, religion, ecology, technology, and human emotion, as the factions of the empire confront each other in a struggle for the control of Arrakis and its spice.'],
            
            ['title' => 'Battle Royale', 'author' => 'Koushun Takami', 
            'description' => 'Koushun Takami\'s notorious high-octane thriller is based on an irresistible premise: a class of junior high school students is taken to a deserted island where, as part of a ruthless authoritarian program, they are provided arms and forced to kill one another until only one survivor is left standing. Criticized as violent exploitation when first published in Japan - where it then proceeded to become a runaway bestseller - Battle Royale is a Lord of the Flies for the 21st century, a potent allegory of what it means to be young and (barely) alive in a dog-eat-dog world. Made into a controversial hit movie of the same name, Battle Royale is already a contemporary Japanese pulp classic.'],
            
            ['title' => 'Nineteen Eighty-Four (1984)', 'author' => 'George Orwell', 
            'description' => 'Nineteen Eighty-Four (also stylised as 1984) is a dystopian social science fiction novel and cautionary tale written by English writer George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell\'s ninth and final book completed in his lifetime. Thematically, it centres on the consequences of totalitarianism, mass surveillance and repressive regimentation of people and behaviours within society. Orwell, a democratic socialist, modelled the totalitarian government in the novel after Stalinist Russia and Nazi Germany. More broadly, the novel examines the role of truth and facts within politics and the ways in which they are manipulated.'],
            
            ['title' => 'A Game Of Thrones', 'author' => 'George R. R. Martin', 
            'description' => 'Winter is coming. Such is the stern motto of House Stark, the northernmost of the fiefdoms that owe allegiance to King Robert Baratheon in far-off King’s Landing. There Eddard Stark of Winterfell rules in Robert’s name. There his family dwells in peace and comfort: his proud wife, Catelyn; his sons Robb, Brandon, and Rickon; his daughters Sansa and Arya; and his bastard son, Jon Snow. Far to the north, behind the towering Wall, lie savage Wildings and worse—unnatural things relegated to myth during the centuries-long summer, but proving all too real and all too deadly in the turning of the season'],
            
            ['title' => 'Paprika', 'author' => 'Yasutaka Tsutsui', 
            'description' => 'Dream monitoring and intervention as a means of treating mental disorders is a developing new form of psychotherapy in the near future. Brilliant psychiatry research establishment employee Atsuko Chiba (千葉敦子, Chiba Atsuko) is the most prominent scientist in this field, using her alter-ego Paprika (パプリカ, Papurika) to infiltrate the dreams of others and treat their illnesses. Her colleague, the brilliant and obese Kōsaku Tokita (時田浩作, Tokita Kōsaku) has created a super-miniaturized version of the Institute\'s existing dream-analysis devices calling it the DC Mini (DCミニ, DC Mini). Unrest ensues when the new psychotherapy device is stolen, allowing the assailant to enter the mind of anyone and enact mind control. The frantic search for the criminal and the DC Mini has begun.'],
            
            ['title' => 'The Twelve Kingdoms: Sea of Shadow', 'author' => 'Fuyumi Ono', 
            'description' => 'For high-schooler Yoko Nakajima, life has been fairly ordinary--that is until Keiki, a young man with golden hair, tells Yoko they must return to their kingdom. Once confronted by this mysterious being and whisked away to an unearthly realm, Yoko is left with only a magical sword; a gem; and a million questions about her destiny, the world she\'s trapped in, and the world she desperately wants to return to.'],
            
            ['title' => 'Napoleon: A Life', 'author' => 'Andrew Roberts', 
            'description' => 'The definitive biography of the great soldier-statesman by the acclaimed author of Churchill and The Last King of America—winner of the LA Times Book prize, finalist for the Plutarch prize, winner of the Fondation Napoleon prize and a New York Times bestseller.\n Andrew Roberts’s Napoleon is the first one-volume biography to take advantage of the recent publication of Napoleon’s thirty-three thousand letters, which radically transform our understanding of his character and motivation. At last we see him as he was: protean multitasker, decisive, surprisingly willing to forgive his enemies and his errant wife Josephine. Like Churchill, he understood the strategic importance of telling his own story, and his memoirs, dictated from exile on St. Helena, became the single bestselling book of the nineteenth century.']
        ];

        DB::table('e_books')->insert($ebooks);
    }
}
