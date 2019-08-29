<?php

class WorkInfo {
    var $name;
    var $position;
    var $company;
    var $company_link;
    var $date;
    var $location;
    var $description;

    function __construct($name, $position, $company, $link, $date, $location, $description)
    {
        $this->name = $name;
        $this->position = $position;
        $this->company = $company;
        $this->company_link = $link;
        $this->date = $date;
        $this->location = $location;
        $this->description = $description;
    }
}

$WORK_LIST = array(
    'spinewave' => new WorkInfo(
        'spinewave',
        'R & D Intern',
        'Spine Wave Inc.',
        'https://www.spinewave.com/',
        'Jun - Aug 2013',
        'Shelton, CT',
        [
            'Helped design and build prototype of a product for marketing purposes. Regularly utilized a wide range of equipment like the Arduino circuit board, 3D printer, various sensors (digital & analog), machine shop, and CAD programs.',
            'Assisted R&D staff with team projects and product cataloging.',
            'Extensive work with SolidWorks CAD program as well as mechanical and circuit design.'
        ]
    ),

    'fast' => new WorkInfo(
        'fast',
        'Developer & Consultant',
        'FAST Enterprises',
        'https://www.fastenterprises.com/',
        'Jul 2015 - Jul 2017',
        'Washington, DC',
        [
            'Worked with a team of talented devlopers to design the 2016/2017 tax return forms for the District of Columbia.',
            'Responsible for the development of online tax return forms on DC’s online Taxpayer Access Portal.',
            'Worked side by side with government clients as a consultant to gather requirements and deliver a streamlined tax solution software.',
            'Extensive use of SQL, Visual Basic and Microsoft SQL Server.'
        ]
    ),

    'siemens_intern' => new WorkInfo(
        'siemens_intern',
        'Robotics Engineer Intern',
        'Siemens',
        'https://new.siemens.com/global/en/company/innovation/corporate-technology.html',
        'Jul - Sep 2018',
        'Princeton, NJ',
        [
            'Worked with a small team of engineers on a project to build a fully autonomous farming system that used robotic arms and mobile robots to water, prune and harvest plants.',
            'Developed a decentralized, multi-agent control algorithm to coordinate movement between agents operating in the farm.',
            'Extensive use of ROS, Python and CAD.'
        ]
    ),
    
    'siemens_contract' => new WorkInfo(
        'siemens_contract',
        'Robotics Engineer',
        'Siemens',
        'https://new.siemens.com/global/en/company/innovation/corporate-technology.html',
        'Feb - Jul 2019',
        'Princeton, NJ',
        [
            'Software architect for a Python based API used to control a robot station comprised of two KUKA arms equipped with wrist cameras.',
            'Lead robotics engineer for a LEGO assembly project in the Future of Automation lab at Princeton, NJ. Worked with a talented team of engineers to research concepts in automating end-to-end manufacturing process - from building a bill of processes, simulating its assembly, and then creating the final product.'
        ]
    )

);

if ($_GET['get_list']) {
    echo json_encode($WORK_LIST);
}

?>