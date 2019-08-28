<?php

class ProjectInfo {
    var $name;
    var $title;
    var $subtitle;
    var $description;
    var $github;
    var $video;
    var $keywords;

    function __construct($name, $title, $subtitle, $description, $github, $video, $keywords)
    {
        $this->name = $name;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->github = $github;
        $this->video = $video;
        $this->keywords = $keywords;
    }
}

$PROJECT_LIST = array (
    'omni' => new ProjectInfo(
        'omni',
        'The Omni Project',
        'MSR Final Project (2018)',
        'Simultaneous operation of three omni-directional robots used for mapping the environment and manipulating large objects',
        '',
        'https://www.youtube.com/embed/xSkom9F3TOs',
        ['ROS', 'Python', 'C/C++', 'Mechatronics', 'Odometry', 'Multi-Agent Systems', 'Circuit Design']
    ),

    'argo' => new ProjectInfo(
        'argo',
        'Argo',
        'MSR Winter Project (2018)',
        'An autonomous differential drive suitcase that uses AR tags to track and follow objects in its environment',
        'https://github.com/aamirhatim/argo',
        'https://www.youtube.com/embed/L7owzQ5A6ZQ',
        ['ROS', 'Python', 'PID Control', 'Motor Control', 'Mechatronics', 'Computer Vision', 'HRI']
    ),

    'day-zero' => new ProjectInfo(
        'day-zero',
        'Day Zero Predictor',
        'EECS349 Final (2018)',
        'Using machine learning to predict when a country will reach "Day Zero" - the time when its water supply is fully depleted',
        'https://github.com/aamirhatim/day_zero_predictor/tree/master/project_data',
        '',
        ['PANDAS', 'Python', 'Weka', 'Machine Learning', 'Data Analytics']
    ),

    'baxter' => new ProjectInfo(
        'baxter',
        'Inspector Baxter',
        'ME495 Final (2017)',
        'An introductory ROS project that uses Rethink Robotics\' Baxter to manipulate objects via speech commands',
        'https://github.com/aamirhatim/InspectorBaxter',
        'https://www.youtube.com/watch?v=Mkh_P828sVU',
        ['ROS', 'Python', 'C++', 'Point Clouds', 'Robotic Manipulation', 'Computer Vision', 'Coordinate Transforms']
    ),

    'techtiles' => new ProjectInfo(
        'techtiles',
        'Techtiles',
        'Capstone Senior Design (2015)',
        'A washable, biometric shirt that measures heart rate, breathing rate, steps, distance, and energy - all sent to a mobile display',
        '',
        'https://youtube.com/embed/g21bp58Fbyo',
        ['Arduino', 'CAD', 'PCB Design', 'C/C++', 'PSPICE', 'Ultiboard', 'Digital Signal Processing', 'Filters', 'Biometrics']
    ),

    'motor' => new ProjectInfo(
        'motor',
        'Motor Controller',
        'ME333 Final (2018)',
        'A closed-loop PID DC motor controller with a MATLAB user interface for low level control',
        'https://github.com/aamirhatim/motor_controller',
        '',
        ['C', 'PID Control', 'Circuit Design', 'SPI', 'UART', 'MATLAB', 'Mechatronics', 'DC Motors', 'Feedback Control']
    ),

    'website' => new ProjectInfo(
        'website',
        'aamirhatim.com',
        'Ongoing Project',
        'The current version of this site was made from scratch (and love) using HTML, CSS, PHP, and Javascript',
        'https://github.com/aamirhatim/aamirhatim.com',
        '',
        ['HTML', 'CSS', 'PHP', 'Javascript', 'Web Development', 'Graphic Design', 'HRI', 'Adobe Illustrator']
    ),

    'kuka' => new ProjectInfo(
        'kuka',
        'Robotic Manipulation',
        'ME449 Final (2017)',
        'Using inverse kinematics and control laws to simulate the KUKA youBot, a 5R wheeled robot',
        '',
        'https://www.youtube.com/watch?time_continue=1&v=LQ2JJwoRYEQ',
        ['Mathematica', 'Feedforward Control', 'Feedback Control', 'V-REP', 'Coordinate Transforms', 'URDF', 'Forward/Inverse Kinematics', 'Odometry']
    ),

    'neural' => new ProjectInfo(
        'neural',
        'Designing a Neural Network',
        'EECS495 (2018)',
        'Learning how to build a library from scratch to implement different kinds of neural networks',
        '',
        '',
        ['Python', 'CNN', 'RNN', 'Regression', 'Neural Networks', 'Machine Learning', 'Backpropagation']
    ),

    'rrt' => new ProjectInfo(
        'rrt',
        'Path Planning',
        'MSR Orientation (2017)',
        'Using RRTs to explore spaces and avoid collisions from a bitmap image and from randomly generated circles',
        'https://github.com/aamirhatim/rrt',
        '',
        ['Python', 'Vector Geometry', 'Data Structures', 'Algorithms', 'Path Planning', 'Machine Learning', 'Artificial Intelligence']
    ),

    'speakers' => new ProjectInfo(
        'speakers',
        'Desktop Speaker Set',
        'Summer Project (2013)',
        'A custom designed, 2.1 channel desktop speaker set that uses active filters to play music through two tweeters and a subwoofer',
        '',
        '',
        ['Circuit Design', 'Speaker Design', 'Analog Filters']
    ),

    'splits' => new ProjectInfo(
        'splits',
        'Doing the Splits',
        'ME 314 - Dynamics (2017)',
        'Using Mathematica to simulate the dynamics of rigid bodies',
        '',
        '',
        ['Mathematica', 'Control Laws', 'Lagrangian Dynamics', 'Constrained Dynamics', 'Coordinate Transforms']
    )
);

if ($_GET['get_list']) {
    echo json_encode($PROJECT_LIST);
}

?>