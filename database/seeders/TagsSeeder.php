<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tags = array(
      array('id' => '19', 'group_id' => null, 'title' => 'Modern Individuality','slug' => 'modern-individuality','created_at' => '2023-09-25 12:06:36','updated_at' => '2023-09-25 12:06:36'),
      array('id' => '20', 'group_id' => null, 'title' => 'Ethics and Life Values','slug' => 'values-and-ethics','created_at' => '2023-09-25 12:06:40','updated_at' => '2023-10-19 06:17:53'),
      array('id' => '21', 'group_id' => null, 'title' => 'Enlightenment','slug' => 'enlightenment','created_at' => '2023-09-25 12:06:45','updated_at' => '2023-09-25 12:06:45'),
      array('id' => '22', 'group_id' => null, 'title' => 'Society','slug' => 'society','created_at' => '2023-09-25 12:06:48','updated_at' => '2023-09-25 12:06:48'),
      array('id' => '23', 'group_id' => null, 'title' => 'Ultimate questions about the World','slug' => 'ultimate-qestions-about-the-world','created_at' => '2023-09-25 12:06:51','updated_at' => '2023-11-22 05:49:23'),

      array('id' => '84','title' => 'Universal Ideals','slug' => 'universal-ideals','group_id' => '22','created_at' => '2023-10-08 06:31:28','updated_at' => '2023-10-08 06:31:57'),
      array('id' => '85','title' => 'Political World','slug' => 'political-world','group_id' => '22','created_at' => '2023-10-08 06:31:34','updated_at' => '2023-10-08 06:31:34'),
      array('id' => '86','title' => 'Distant Future','slug' => 'distant-future','group_id' => '21','created_at' => '2023-10-08 06:31:38','updated_at' => '2023-10-19 06:04:28'),
      array('id' => '87','title' => 'Social Development','slug' => 'social-development','group_id' => '22','created_at' => '2023-10-08 06:32:20','updated_at' => '2023-10-08 06:32:20'),
      array('id' => '24','title' => 'Freedom','slug' => 'freedom','group_id' => '22','created_at' => '2023-10-08 06:32:24','updated_at' => '2023-10-08 06:32:24'),
      array('id' => '25','title' => 'Modern Issues','slug' => 'modern-issues','group_id' => '22','created_at' => '2023-10-08 06:32:28','updated_at' => '2023-10-08 06:33:08'),
      array('id' => '26','title' => 'Humanity','slug' => 'goals-of-humanity','group_id' => '22','created_at' => '2023-10-08 06:32:35','updated_at' => '2023-10-16 05:03:48'),
      array('id' => '27','title' => 'Future of the Universe','slug' => 'future-of-the-universe','group_id' => '23','created_at' => '2023-10-08 06:32:42','updated_at' => '2023-10-08 06:32:42'),
      array('id' => '29','title' => 'Infinity','slug' => 'infinity','group_id' => '23','created_at' => '2023-10-08 06:32:49','updated_at' => '2023-10-08 06:32:49'),
      array('id' => '31','title' => 'Possible World','slug' => 'possible-world','group_id' => '23','created_at' => '2023-10-08 06:34:05','updated_at' => '2023-10-08 06:34:05'),
      array('id' => '32','title' => 'Time','slug' => 'time','group_id' => '23','created_at' => '2023-10-08 06:34:08','updated_at' => '2023-10-08 06:34:08'),
      array('id' => '34','title' => 'Mysteries of Existence','slug' => 'mysteries-of-existence','group_id' => '23','created_at' => '2023-10-08 06:34:18','updated_at' => '2023-10-08 06:34:18'),
      array('id' => '36','title' => 'Multiverse','slug' => 'multiverse','group_id' => '23','created_at' => '2023-10-08 06:34:32','updated_at' => '2023-10-08 06:34:32'),
      array('id' => '37','title' => 'Mathematics','slug' => 'mathematics','group_id' => '23','created_at' => '2023-10-08 06:34:36','updated_at' => '2023-10-08 06:34:36'),
      array('id' => '38','title' => 'Self-organizing matter','slug' => 'matter','group_id' => '23','created_at' => '2023-10-08 06:35:06','updated_at' => '2023-10-12 08:31:33'),
      array('id' => '40','title' => 'Beginning of Existence','slug' => 'beginning-of-existence','group_id' => '23','created_at' => '2023-10-08 06:35:16','updated_at' => '2023-10-08 06:35:16'),
      array('id' => '41','title' => 'Nothingness','slug' => 'nothingness','group_id' => '23','created_at' => '2023-10-08 06:35:20','updated_at' => '2023-10-08 06:35:20'),
      array('id' => '42','title' => 'Knowability of the World','slug' => 'can-we-comprehend-the-world','group_id' => '23','created_at' => '2023-10-08 06:35:29','updated_at' => '2023-10-18 05:28:36'),
      array('id' => '44','title' => 'Origin of the Intelligence','slug' => 'origin-of-the-mind','group_id' => '23','created_at' => '2023-10-08 06:35:41','updated_at' => '2023-10-12 10:16:09'),
      array('id' => '46','title' => 'Greatness of Humanity','slug' => 'greatness-of-humanity','group_id' => '21','created_at' => '2023-10-08 06:35:53','updated_at' => '2023-10-08 06:35:53'),
      array('id' => '47','title' => 'Humanism','slug' => 'humanism','group_id' => '21','created_at' => '2023-10-08 06:35:59','updated_at' => '2023-10-08 06:35:59'),
      array('id' => '48','title' => 'Artificial Intelligence','slug' => 'artificial-intelligence','group_id' => '21','created_at' => '2023-10-08 06:36:05','updated_at' => '2023-10-08 06:36:05'),
      array('id' => '49','title' => 'Science and Doctrines','slug' => 'science','group_id' => '21','created_at' => '2023-10-08 06:36:09','updated_at' => '2023-10-19 04:37:41'),
      array('id' => '51','title' => 'Enlightenment','slug' => 'enlightenment','group_id' => '21','created_at' => '2023-10-08 06:36:19','updated_at' => '2023-10-08 06:36:19'),
      array('id' => '52','title' => 'Scholars and Thinkers','slug' => 'scholars-and-thinkers','group_id' => '21','created_at' => '2023-10-08 06:36:50','updated_at' => '2023-10-08 06:36:50'),
      array('id' => '54','title' => 'Gratitude','slug' => 'gratitude','group_id' => '19','created_at' => '2023-10-08 06:37:21','updated_at' => '2023-10-08 06:37:21'),
      array('id' => '55','title' => 'Optimism and Beliefs','slug' => 'convictions','group_id' => '19','created_at' => '2023-10-08 06:37:26','updated_at' => '2023-11-27 13:00:39'),
      array('id' => '56','title' => 'Spirituality','slug' => 'spirituality','group_id' => '19','created_at' => '2023-10-08 06:37:29','updated_at' => '2023-10-08 06:37:29'),
      array('id' => '57','title' => 'Life Stance','slug' => 'life-stance','group_id' => '19','created_at' => '2023-10-08 06:37:34','updated_at' => '2023-10-08 06:37:34'),
      array('id' => '58','title' => 'Love of Life','slug' => 'love-of-life','group_id' => '19','created_at' => '2023-10-08 06:37:38','updated_at' => '2023-10-08 06:37:38'),
      array('id' => '59','title' => 'Critical Thinking','slug' => 'critical-thinking','group_id' => '19','created_at' => '2023-10-08 06:37:42','updated_at' => '2023-10-08 06:37:42'),
      array('id' => '60','title' => 'Worldview','slug' => 'worldview','group_id' => '19','created_at' => '2023-10-08 06:37:47','updated_at' => '2023-10-08 06:37:47'),
      array('id' => '61','title' => 'Wisdom','slug' => 'wisdom','group_id' => '19','created_at' => '2023-10-08 06:37:51','updated_at' => '2023-10-08 06:37:51'),
      array('id' => '62','title' => 'Full Life','slug' => 'full-life','group_id' => '19','created_at' => '2023-10-08 06:37:56','updated_at' => '2023-10-08 06:37:56'),
      array('id' => '63','title' => 'Beauty','slug' => 'beautiful','group_id' => '20','created_at' => '2023-10-08 06:38:00','updated_at' => '2023-10-19 04:42:15'),
      array('id' => '64','title' => 'Professionalism','slug' => 'professionalism','group_id' => '19','created_at' => '2023-10-08 06:38:04','updated_at' => '2023-10-08 06:38:04'),
      array('id' => '65','title' => 'Personal Growth','slug' => 'personal-development','group_id' => '19','created_at' => '2023-10-08 06:38:08','updated_at' => '2023-10-16 04:47:48'),
      array('id' => '66','title' => 'Meaning of Life','slug' => 'meaning-of-life','group_id' => '19','created_at' => '2023-10-08 06:38:11','updated_at' => '2023-10-08 06:38:11'),
      array('id' => '67','title' => 'Self-Control','slug' => 'self-control','group_id' => '19','created_at' => '2023-10-08 06:38:16','updated_at' => '2023-10-08 06:38:16'),
      array('id' => '68','title' => 'Self-Realization','slug' => 'self-realization','group_id' => '19','created_at' => '2023-10-08 06:38:19','updated_at' => '2023-10-08 06:38:19'),
      array('id' => '69','title' => 'Humor and Irony','slug' => 'humor-and-irony','group_id' => '19','created_at' => '2023-10-08 06:38:28','updated_at' => '2023-10-08 06:38:28'),
      array('id' => '70','title' => 'Virtues','slug' => 'virtues','group_id' => '20','created_at' => '2023-10-08 06:38:45','updated_at' => '2023-10-08 06:38:45'),
      array('id' => '71','title' => 'Good and Evil','slug' => 'good-and-evil','group_id' => '20','created_at' => '2023-10-08 06:38:51','updated_at' => '2023-10-08 06:38:51'),
      array('id' => '72','title' => 'Moral Obligation','slug' => 'moral-obligation','group_id' => '20','created_at' => '2023-10-08 06:38:55','updated_at' => '2023-10-08 06:38:55'),
      array('id' => '73','title' => 'Right Life','slug' => 'right-life','group_id' => '20','created_at' => '2023-10-08 06:39:03','updated_at' => '2023-10-08 06:39:03'),
      array('id' => '74','title' => 'Human Nature','slug' => 'human-nature','group_id' => '20','created_at' => '2023-10-08 06:39:07','updated_at' => '2023-10-08 06:39:07'),
      array('id' => '75','title' => 'Conscience','slug' => 'conscience','group_id' => '20','created_at' => '2023-10-08 06:39:10','updated_at' => '2023-10-08 06:39:10'),
      array('id' => '77','title' => 'Happiness','slug' => 'happiness','group_id' => '20','created_at' => '2023-10-08 06:39:17','updated_at' => '2023-10-08 06:39:17'),
      array('id' => '78','title' => 'Value of Life','slug' => 'value-of-life','group_id' => '20','created_at' => '2023-10-08 06:39:25','updated_at' => '2023-10-08 06:39:25'),
      array('id' => '79','title' => 'Life Values','slug' => 'values-and-ideals','group_id' => '20','created_at' => '2023-10-08 06:39:28','updated_at' => '2023-10-19 04:52:42'),
      array('id' => '80','title' => 'Humaneness','slug' => 'humaneness','group_id' => '20','created_at' => '2023-10-08 06:39:31','updated_at' => '2023-10-08 06:39:31'),
      array('id' => '81','title' => 'Ethics','slug' => 'ethics','group_id' => '20','created_at' => '2023-10-08 06:39:36','updated_at' => '2023-10-08 06:39:36'),
      array('id' => '82','title' => 'Self-Respect','slug' => 'self-respect','group_id' => '19','created_at' => '2023-10-08 06:42:14','updated_at' => '2023-10-08 06:42:14'),
      array('id' => '83','title' => 'Rationality','slug' => 'rationality','group_id' => '19','created_at' => '2023-10-19 03:25:11','updated_at' => '2023-10-19 03:25:11')
    );

    foreach ($tags as $tag) {
      Tag::create([
        'id' => $tag['id'],
        'title' => $tag['title'],
        'parent_id' => $tag['group_id'],
      ]);
    }
  }
}
