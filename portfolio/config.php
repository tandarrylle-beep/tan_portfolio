<?php
// ============================================
// SITE CONFIGURATION — Edit this file freely
// ============================================

define('SITE_NAME', 'Darrylle A. Tan');
define('SITE_TAGLINE', 'Freelance Developer & IT Student');
define('SITE_DESC', 'IT student & freelance developer from Zambales, PH. I build websites, design interfaces, automate workflows with AI, and structure data using SQL and Excel.');

// Personal Info
$personal = [
  'name'      => 'Darrylle A. Tan',
  'nickname'  => 'Darrylle',
  'title'     => 'BS Information Technology Student & Freelance Developer',
  'location'  => 'Candelaria, Zambales, Philippines',
  'email'     => 'tandarrylle@gmail.com',
  'phone'     => '09062075819',
  'age'       => '21',
  'status'    => 'Available for freelance',
  'photo'     => 'assets/img/darrylle-photo.jpg',
  'cv_link'   => 'https://www.dropbox.com/scl/fi/sd4fuwc9mkig7syhxwiy2/tan_resume.pdf?rlkey=o83iuxt230xpa5fsmcaa6l2m1&st=9v34rsbq&dl=0',
  'bio_short' => "IT student & freelance developer from Zambales, PH. I build websites, design interfaces, automate workflows with AI, and structure data using SQL and Excel — one person covering it all.",
  'bio_long'  => "Hi, I'm Darrylle — a 4th-year Information Technology student at President Ramon Magsaysay State University with a strong passion for building digital solutions that are both functional and user-friendly. I specialize in web development, UI/UX design, AI automation, and SQL-based data management. Whether it's building a mobile ordering app, designing a database, or automating a workflow, I bring dedication, fast learning, and sharp analytical thinking to everything I build.",
  'school'    => 'President Ramon Magsaysay State University',
  'degree'    => 'Bachelor of Science in Information Technology',
  'year'      => '2023 – 2025 (4th Year)',
];

// Social Links
$socials = [
  ['label' => 'LinkedIn', 'short' => 'in',  'url' => 'https://www.linkedin.com/in/tandarrylle/'],
  ['label' => 'GitHub',   'short' => 'gh',  'url' => 'https://github.com/tandarrylle-beep/my-portfolio.git'],
  ['label' => 'Facebook', 'short' => 'fb',  'url' => 'https://www.facebook.com/darrylle.tan13'],
];

// Stats
$stats = [
  ['num' => 3,   'label' => 'Projects Completed'],
  ['num' => 4,   'label' => 'Years of Coding'],
  ['num' => 6,   'label' => 'Technologies Used'],
  ['num' => 100, 'label' => '% Commitment', 'suffix' => '%'],
];

// Services
$services = [
  [
    'icon' => 'code',
    'name' => 'Web Development',
    'tagline' => 'Fast, responsive & clean code',
    'desc' => 'I build websites and web applications from scratch using modern technologies. Whether it\'s a personal portfolio, business site, or a full web app — I write clean, structured code that performs well.',
    'bullets' => ['Responsive layouts that work on all screen sizes', 'Interactive features using JavaScript', 'Backend integration with PHP and databases', 'Performance optimization and clean code structure'],
    'tools' => ['HTML', 'CSS', 'JavaScript', 'PHP'],
  ],
  [
    'icon' => 'mobile',
    'name' => 'Mobile App Development',
    'tagline' => 'Cross-platform mobile apps',
    'desc' => 'Cross-platform mobile applications using React Native and JavaScript with intuitive UIs and smooth performance.',
    'bullets' => ['React Native apps for iOS & Android', 'Smooth animations and transitions', 'Local storage and state management', 'Custom UI components from scratch'],
    'tools' => ['React Native', 'JavaScript', 'Expo'],
  ],
  [
    'icon' => 'design',
    'name' => 'UI/UX Design',
    'tagline' => 'Interfaces users love',
    'desc' => 'I design digital interfaces that look polished and feel natural to use. Aesthetic sense combined with understanding of how users think.',
    'bullets' => ['Wireframes and user flow mapping', 'High-fidelity UI mockups', 'Mobile-first design approach', 'Consistent design systems'],
    'tools' => ['Figma', 'Wireframing', 'Prototyping'],
  ],
  [
    'icon' => 'ai',
    'name' => 'AI / ML Integration',
    'tagline' => 'Smart workflows, less manual work',
    'desc' => 'Using AI and ML tools, I build intelligent systems that automate repetitive tasks and add smart functionality to your product.',
    'bullets' => ['AI-powered gesture recognition', 'Custom ML model integration', 'Workflow automation using AI APIs', 'Data processing pipelines'],
    'tools' => ['TensorFlow', 'TFLite', 'MediaPipe', 'OpenAI API'],
  ],
  [
    'icon' => 'database',
    'name' => 'Database Management',
    'tagline' => 'SQL & structured data',
    'desc' => 'SQL database design, query writing, and data structuring using MySQL Workbench for organized, reliable data systems.',
    'bullets' => ['Relational database design', 'SQL queries for filtering & reporting', 'Data cleaning and structuring', 'MySQL Workbench implementation'],
    'tools' => ['SQL', 'MySQL', 'MySQL Workbench'],
  ],
  [
    'icon' => 'excel',
    'name' => 'Excel & Data Management',
    'tagline' => 'Organized data, smart decisions',
    'desc' => 'Organized spreadsheets, data reports, and structured records using Microsoft Excel for clear, data-driven decisions.',
    'bullets' => ['Excel models with formulas', 'Dynamic tables and pivot reports', 'Data visualization with charts', 'Power Query automation'],
    'tools' => ['Excel', 'Power Query', 'MS Office'],
  ],
];

// Skills
$skills = [
  'Development' => [
    ['name' => 'HTML / CSS',    'pct' => 85],
    ['name' => 'JavaScript',    'pct' => 80],
    ['name' => 'React Native',  'pct' => 75],
    ['name' => 'PHP',           'pct' => 65],
  ],
  'Data & AI' => [
    ['name' => 'SQL / MySQL',        'pct' => 80],
    ['name' => 'Microsoft Excel',    'pct' => 78],
    ['name' => 'TensorFlow / TFLite','pct' => 65],
    ['name' => 'MediaPipe',          'pct' => 70],
  ],
];

// Skill tags
$skill_tags = [
  'Technical'   => ['HTML / CSS','JavaScript','PHP','React Native','SQL / MySQL','TensorFlow','TFLite','MediaPipe','Excel','PowerPoint','MS Word'],
  'Soft Skills' => ['Problem-solving','Analytical thinking','Fast learner','Team collaboration','Communication','Time management'],
];

// Projects — Add more projects here easily!
$projects = [
  [
    'id'      => 'sign-language-translator',
    'num'     => '01',
    'name'    => 'Realtime Sign Language Translator',
    'type'    => 'AI / Mobile App',
    'color'   => ['from' => '#0f2027', 'to' => '#0d3d35'],
    'accent'  => '#2ec4a0',
    'desc'    => 'A React Native mobile app that detects hand gestures in real-time using MediaPipe and translates them to text using a trained LSTM model.',
    'bullets' => [
      'Detects hand gestures using MediaPipe Hand Landmarker',
      'Custom LSTM model converting hand signs to text output',
      'Optimized UI for smooth real-time detection performance',
    ],
    'tools'   => ['React Native', 'LSTM', 'MediaPipe', 'TFLite'],
    'status'  => 'Completed',
    'year'    => '2024',
  ],
  [
    'id'      => 'student-database',
    'num'     => '02',
    'name'    => 'Student Information Database',
    'type'    => 'Database Management',
    'color'   => ['from' => '#0c1445', 'to' => '#1a237e'],
    'accent'  => '#7986cb',
    'desc'    => 'A relational database system for managing student records, designed and implemented in MySQL Workbench with complex queries and reporting.',
    'bullets' => [
      'Designed relational database for managing student records',
      'Created tables, relationships, and constraints in MySQL Workbench',
      'Built SQL queries for inserting, updating, filtering & reporting',
    ],
    'tools'   => ['MySQL', 'SQL', 'MySQL Workbench'],
    'status'  => 'Completed',
    'year'    => '2024',
  ],
  [
    'id'      => 'big-brew-app',
    'num'     => '03',
    'name'    => 'Big Brew Ordering System App',
    'type'    => 'Mobile App',
    'color'   => ['from' => '#3e1f00', 'to' => '#7c3d00'],
    'accent'  => '#ff9800',
    'desc'    => 'A mobile ordering app for a milk tea business built with React Native. Features intuitive drink selection, dynamic pricing, and real-time order management.',
    'bullets' => [
      'Mobile ordering app for a milk tea business',
      'Intuitive UI for selecting drinks, sizes, flavors & add-ons',
      'Dynamic pricing, real-time updates, and local storage cart',
    ],
    'tools'   => ['React Native', 'JavaScript', 'Local Storage'],
    'status'  => 'Completed',
    'year'    => '2024',
  ],
];
