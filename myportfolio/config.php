<?php
// =============================================
// SITE CONFIGURATION — Edit freely
// =============================================

define('SITE_NAME', 'Darrylle A. Tan');
define('SITE_TAGLINE', 'AI Developer · Full-Stack Developer · Data Specialist');
define('SITE_DESC', 'IT graduate specializing in AI/ML, full-stack web/mobile development, and data management. Based in Zambales, Philippines.');

// =============================================
// GMAIL SMTP SETTINGS
// HOW TO SET UP (2 minutes):
//   1. Enable 2-Factor Auth on Google: https://myaccount.google.com/security
//   2. Go to: https://myaccount.google.com/apppasswords
//   3. App: "Mail"  |  Device: "Other (Portfolio)"
//   4. Copy the 16-character App Password Google gives you
//   5. Paste it below (with or without spaces — both work)
// =============================================
define('GMAIL_ADDRESS',      'tandarrylle@gmail.com');
define('GMAIL_APP_PASSWORD', 'xxxx xxxx xxxx xxxx');   // ← Replace with your App Password
define('GMAIL_FROM_NAME',    'Darrylle Portfolio');
define('NOTIFY_EMAIL',       'tandarrylle@gmail.com');

// =============================================
// PERSONAL INFO
// =============================================
$personal = [
    'name'       => 'Darrylle A. Tan',
    'nickname'   => 'Darrylle',
    'title'      => 'BS Information Technology Student & AI Developer',
    'location'   => 'Candelaria, Zambales, Philippines',
    'email'      => 'tandarrylle@gmail.com',
    'phone'      => '09062075819',
    'age'        => '21',
    'status'     => 'Open to Full-Time, Part-Time & Gig Projects',
    'photo'      => 'assets/img/frontphoto.jpeg',
    'cv_link'    => 'https://www.dropbox.com/scl/fi/8x5dnzympvgyu5hirbmm5/tandarrylle_CV.docx?rlkey=k7fifoi55ptwcx19qe8ynm848&st=hotlap86&dl=0',
    'bio_short'  => 'Results-driven IT graduate specializing in AI/ML, data management, and full-stack development. I build AI-powered apps, engineer SQL databases, and deliver clean web & mobile solutions — full-time, part-time, or as a gig.',
    'bio_long'   => "Hi, I'm Darrylle — a 4th-year Information Technology student at President Ramon Magsaysay State University with a strong passion for building digital solutions that are both functional and user-friendly. I specialize in web development, AI automation, and SQL-based data management. Whether it's building a mobile ordering app, designing a database, or automating a workflow, I bring dedication, fast learning, and sharp analytical thinking to everything I build.",
    'school'     => 'President Ramon Magsaysay State University',
    'degree'     => 'Bachelor of Science in Information Technology',
    'distinction'=> 'Academic Distinction',
    'year'       => 'August 2022 – May 2026',
];

// =============================================
// AVAILABILITY
// =============================================
$availability = [
    ['label' => 'Full-Time',      'color' => '#00e5a0', 'bg' => 'rgba(0,229,160,0.1)',  'border' => 'rgba(0,229,160,0.25)'],
    ['label' => 'Part-Time',      'color' => '#4d9fff', 'bg' => 'rgba(77,159,255,0.1)', 'border' => 'rgba(77,159,255,0.25)'],
    ['label' => 'Gig / Projects', 'color' => '#f0c040', 'bg' => 'rgba(240,192,64,0.1)', 'border' => 'rgba(240,192,64,0.25)'],
];

// =============================================
// SOCIAL LINKS
// =============================================
$socials = [
    ['label' => 'LinkedIn', 'short' => 'in', 'url' => 'https://www.linkedin.com/in/tandarrylle/'],
    ['label' => 'GitHub',   'short' => 'gh', 'url' => 'https://github.com/tandarrylle-beep'],
    ['label' => 'Facebook', 'short' => 'fb', 'url' => 'https://www.facebook.com/darrylle.tan13'],
];

// =============================================
// STATS
// =============================================
$stats = [
    ['num' => 5,    'label' => 'Projects Completed'],
    ['num' => 2,    'label' => 'Years of Coding'],
    ['num' => 3500, 'label' => 'Records Processed', 'suffix' => '+'],
    ['num' => 100,  'label' => '% Commitment',       'suffix' => '%'],
];

// =============================================
// EXPERIENCE
// =============================================
$experience = [
    [
        'role'    => 'GIS Data Specialist / IT Intern',
        'company' => "Assessor's Office – Zambales LGU",
        'period'  => 'February 2026 – May 2026',
        'type'    => 'Internship',
        'bullets' => [
            'Encoded and validated 3,500+ geospatial household records across 7 barangays using QGIS, achieving 98%+ data accuracy.',
            'Digitized spatial layers including lot boundaries, ownership data, and land values — reducing manual lookup time by ~40%.',
            'Performed ETL operations on raw attribute data, enforcing data integrity standards for government digitization compliance.',
            'Contributed to map production and spatial analysis supporting local governance decision-making.',
        ],
        'tools'   => ['QGIS', 'Excel'],
    ],
];

// =============================================
// SERVICES
// =============================================
$services = [
    [
        'icon'    => 'code',
        'name'    => 'Web Development',
        'tagline' => 'Fast, responsive & clean code',
        'desc'    => 'Responsive websites and web apps from scratch using modern technologies — clean, structured code that performs well.',
        'bullets' => ['Responsive layouts for all screen sizes', 'Interactive features using JavaScript', 'Backend with PHP & databases', 'Performance optimization'],
        'tools'   => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Node.js'],
    ],
    [
        'icon'    => 'mobile',
        'name'    => 'Mobile App Development',
        'tagline' => 'Cross-platform apps',
        'desc'    => 'Cross-platform mobile applications using React Native — intuitive UIs, smooth performance, tested on Android.',
        'bullets' => ['React Native apps for iOS & Android', 'AsyncStorage & state management', 'Custom reusable UI components', 'Android Studio testing'],
        'tools'   => ['React Native', 'JavaScript', 'AsyncStorage', 'Android Studio', 'Kotlin'],
    ],
    [
        'icon' => 'automation',
        'name' => 'AI Specialist / Automation',
        'tagline' => 'Making work easier with smart tools',
        'desc' => 'I help simplify everyday tasks by setting up smart systems and AI tools that save time and reduce manual work. My goal is to make your processes smoother, easier, and more efficient—without the tech overwhelm.',
        'bullets' => ['Simple workflow automation setup', 'AI tools for daily tasks', 'Organizing and improving processes', 'Easy-to-manage systems'],
        'tools' => ['Claude', 'GoHighLevel (GHL)','HubSpot'],
    ],
    [
        'icon' => 'ai',
        'name' => 'AI / ML Integration',
        'tagline' => 'Smart workflows, less manual work',
        'desc' => 'Using AI and ML tools, I build intelligent systems that automate repetitive tasks and add smart functionality to your product.',
        'bullets' => ['AI-powered gesture recognition', 'Custom ML model integration', 'Workflow automation using AI APIs', 'Data processing pipelines'],
        'tools' => ['TensorFlow', 'Computer Vision', 'MediaPipe', 'Roboflow', 'CVAT'],
  ],
    [
        'icon'    => 'database',
        'name'    => 'Database Management',
        'tagline' => 'Normalized, query-ready databases',
        'desc'    => 'Relational database design from ERD modeling to stored procedures, triggers, and optimized queries.',
        'bullets' => ['Normalization (1NF–3NF)', 'ERD design & schema documentation', 'Stored procedures, joins & triggers', 'Query optimization & indexing'],
        'tools'   => ['MySQL', 'SQL'],
    ],
    [
        'icon'    => 'gis',
        'name'    => 'GIS & Data Mapping',
        'tagline' => 'Geospatial & structured data and mapping',
        'desc'    => 'Geospatial data encoding, validation, and mapping lot for government and enterprise projects.',
        'bullets' => ['Geospatial encoding & validation', 'ETL operations on raw data', 'Mapping lot', 'Map production & spatial analysis'],
        'tools'   => ['QGIS', 'Excel'],
    ],
];

// =============================================
// SKILLS
// =============================================
$skills = [
    'AI / Machine Learning' => [
        ['name' => 'TensorFlow / TFLite',   'pct' => 78],
        ['name' => 'MediaPipe',             'pct' => 82],
        ['name' => 'Scikit-learn / LSTM',   'pct' => 70],
        ['name' => 'Data Annotation (CVAT)','pct' => 75],
    ],
    'Development' => [
        ['name' => 'HTML / CSS / JS',       'pct' => 90],
        ['name' => 'React Native',          'pct' => 84],
        ['name' => 'PHP / Node.js',         'pct' => 70],
        ['name' => 'SQL / MySQL',           'pct' => 85],
    ],
    'Data & GIS' => [
        ['name' => 'QGIS / GIS',            'pct' => 85],
        ['name' => 'Pandas / NumPy',        'pct' => 72],
        ['name' => 'Excel / Google Sheets', 'pct' => 85],
        ['name' => 'Jupyter Notebook',      'pct' => 75],
    ],
];

$skill_tags = [
    'Technical' => [
        'HTML/CSS','JavaScript','PHP','React Native','SQL/MySQL',
        'TensorFlow','MediaPipe','LSTM',
        'QGIS','CVAT','Excel','Android Studio', 'Kotlin',
    ],
    'Tools & Platforms' => [
        'Claude', 'WordPress', 'Flow', 'Gemini', 'MySQL/SQL','Jupyter Notebook','Google Workspace',
        'MS Office','CVAT',
    ],
    'Soft Skills' => [
        'Problem-solving','Analytical thinking','Fast learner',
        'Agile collaboration','Data quality assurance','Time management',
    ],
];

// =============================================
// PROJECTS
// =============================================
$projects = [
    [
        'id'      => 'sign-language-translator',
        'num'     => '01',
        'name'    => 'Real-Time AI Sign Language Translator',
        'type'    => 'AI / Mobile App',
        'year'    => '2025',
        'status'  => 'Completed',
        'color'   => ['from' => '#1a0533', 'to' => '#2d1060'],
        'accent'  => '#a855f7',
        'desc'    => 'AI-powered React Native app that translates Filipino Sign Language (FSL) gestures to text in real-time using MediaPipe and a custom LSTM neural network — sub-200ms inference latency on Android, 100% offline.',
        'bullets' => [
            'Real-time gesture-to-text with sub-200ms inference on Android',
            '100% offline via TFLite on-device ML — zero cloud dependency',
            '~30% frame processing improvement through profiling & refactoring',
            '100+ FSL signs — searchable Datalist + video import features',
        ],
        'tools'   => ['React Native', 'LSTM', 'MediaPipe', 'TFLite', 'TensorFlow', 'JavaScript'],
        'images'  => [
            ['src' => 'assets/img/projects/sign/home_page.jpg',       'caption' => 'Home Screen'],
            ['src' => 'assets/img/projects/sign/live_translation.jpg','caption' => 'Live Sign Translator'],
            ['src' => 'assets/img/projects/sign/import_video.jpg',    'caption' => 'Import Video'],
            ['src' => 'assets/img/projects/sign/data_list.jpg',       'caption' => 'FSL Datalist (100+ Signs)'],
            ['src' => 'assets/img/projects/sign/about_page.jpg',      'caption' => 'About Page'],
        ],
    ],
    [
        'id'      => 'big-brew-ordering',
        'num'     => '02',
        'name'    => 'Big Brew Ordering System',
        'type'    => 'Mobile App',
        'year'    => '2024',
        'status'  => 'Completed',
        'color'   => ['from' => '#1a0a00', 'to' => '#5c2800'],
        'accent'  => '#f97316',
        'desc'    => 'Full-featured mobile ordering app for Big Brew — a milk tea retail business. Dynamic menus, cart management, GCash/Cash payment processing, and persistent order history via AsyncStorage.',
        'bullets' => [
            'Dynamic menu: Milk Tea, Fruit Tea, Iced Coffee & more categories',
            'Real-time cart with size selection (Medio/Grande) and add-ons',
            'Payment flow: Cash, GCash, Credit Card & Debit Card',
            'Persistent order history — zero critical bugs at delivery',
        ],
        'tools'   => ['React Native', 'JavaScript', 'AsyncStorage', 'Android Studio'],
        'images'  => [
            ['src' => 'assets/img/projects/bigbrew/login.png',         'caption' => 'Login Screen'],
            ['src' => 'assets/img/projects/bigbrew/home_milktea.png',  'caption' => 'Milk Tea Menu'],
            ['src' => 'assets/img/projects/bigbrew/home_kiwi.png',     'caption' => 'Fruit Tea Menu'],
            ['src' => 'assets/img/projects/bigbrew/customer_order.png','caption' => 'Customer Orders'],
            ['src' => 'assets/img/projects/bigbrew/payment.png',       'caption' => 'Payment Method'],
            ['src' => 'assets/img/projects/bigbrew/calendar.png',      'caption' => 'Calendar Integration'],
        ],
    ],
    [
        'id'      => 'healthcare-db',
        'num'     => '03',
        'name'    => 'Healthcare Appointment System — SQL DB',
        'type'    => 'Database Management',
        'year'    => '2024',
        'status'  => 'Completed',
        'color'   => ['from' => '#001a3d', 'to' => '#003380'],
        'accent'  => '#4d9fff',
        'desc'    => 'Normalized relational SQL database for a Healthcare Appointment Management System — 6+ entities, full referential integrity, stored procedures and triggers, ready for 10,000+ patient records.',
        'bullets' => [
            'Normalized (1NF–3NF): patients, doctors, appointments & departments',
            'Full referential integrity via primary and foreign key constraints',
            'Stored procedures, joins & triggers cutting report generation by ~50%',
            'ERD & schema documentation, indexing-ready for 10,000+ records',
        ],
        'tools'   => ['MySQL', 'SQL', 'MySQL Workbench', 'ERDPlus'],
        'images'  => [],
    ],
    
    [
        'id'      => 'gis-barangay',
        'num'     => '04',
        'name'    => 'Barangay Geospatial Household Info System',
        'type'    => 'GIS / Data Management',
        'year'    => '2025',
        'status'  => 'Completed',
        'color'   => ['from' => '#0a1a00', 'to' => '#1e3800'],
        'accent'  => '#84cc16',
        'desc'    => 'Managed and encoded 3,500+ demographic and geospatial household records for the Assessor\'s Office of Zambales LGU — 98%+ accuracy across 7 barangays, reducing manual lookup time by ~40%.',
        'bullets' => [
            '3,500+ geospatial records encoded & validated across 7 barangays',
            'Digitized lot boundaries, ownership data & land values in QGIS',
            'ETL operations enforcing government digitization compliance',
            'Reduced manual lookup time by ~40% through structured datasets',
        ],
        'tools'   => ['QGIS', 'Excel', 'SQL Concepts', 'ETL'],
        'images'  => [],
    ],
];
