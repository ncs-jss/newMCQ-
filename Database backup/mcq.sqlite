-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2014 at 02:48 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mcqdata`
--
CREATE DATABASE IF NOT EXISTS `mcqdata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mcqdata`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'root', '22aad504937080f0b5f15601518ca821');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `score` int(10) NOT NULL,
  `Logout_status` int(1) NOT NULL DEFAULT '1',
  `Year` int(11) NOT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Number`, `gender`, `name`, `branch`, `email`, `password`, `score`, `Logout_status`, `Year`) VALUES
(1, 'Male', 'Prashant Chaudhary', 'CS1', 'a@a.com', '0cc175b9c0f1b6a831c399e269772661', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `enable_mcq`
--

CREATE TABLE IF NOT EXISTS `enable_mcq` (
  `mcq_state` tinyint(1) NOT NULL,
  UNIQUE KEY `mcq_state` (`mcq_state`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enable_mcq`
--

INSERT INTO `enable_mcq` (`mcq_state`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `marking_scheme`
--

CREATE TABLE IF NOT EXISTS `marking_scheme` (
  `negative_marking` tinyint(1) NOT NULL,
  `negative` int(3) NOT NULL,
  `positive` int(3) NOT NULL,
  UNIQUE KEY `negative_marking` (`negative_marking`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marking_scheme`
--

INSERT INTO `marking_scheme` (`negative_marking`, `negative`, `positive`) VALUES
(0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `b` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `d` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ans` varchar(4) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `a`, `b`, `c`, `d`, `ans`) VALUES
(1, 'What will be the output of the program?\r\n#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    const int x=5;\r\n    const int *ptrx;\r\n    ptrx = &x;\r\n    *ptrx = 10;\r\n    printf("%d\n", x);\r\n    return 0;\r\n}\r\n', '5', '10', 'Error', 'Garbage value', 'c'),
(2, 'What will be the output of the program ?\r\n#include<stdio.h>\r\npower(int**);\r\nint main()\r\n{\r\n    int a=5, *aa; /* Address of ''a'' is 1000 */\r\n    aa = &a;\r\n    a = power(&aa);\r\n    printf("%d\\n", a);\r\n    return 0;\r\n}\r\npower(int **ptr)\r\n{\r\n    int b;\r\n    b = **ptr***ptr;\r\n    return (b);\r\n}\r\n', '5', '25', '125', 'Garbage Value', 'b'),
(3, 'Which of the following statement is correct?', 'C++ enables to define functions that take constants as an argument.', 'We cannot change the argument of the function that that are declared as constant.', 'Both A and B', 'We cannot use the constant while defining the function.', 'c'),
(4, 'Which of the following statement will be correct if the function has three arguments passed to it?', 'The trailing argument will be the default argument.', 'The first argument will be the default argument.', 'The middle argument will be the default argument.', 'All the argument will be the default argument.', 'a'),
(5, 'What will be the output of the program ?\r\n#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    char str[] = "peace";\r\n    char *s = str;\r\n    printf("%s\n", s++ +3);\r\n    return 0;\r\n}\r\n', 'peace', 'eace', 'ace', 'ce', 'd'),
(6, 'What will be the output of the program?\r\n#include<stdio.h>\r\nint main()\r\n{\r\n    int i=2;\r\n    printf("%d, %d\n", ++i, ++i);\r\n    return 0;\r\n}\r\n', '3,4', '4,3', '4,4', 'Answer may vary from compiler to compiler', 'd'),
(7, 'Which of the following are Java reserved words?\r\n1. run\r\n2. import\r\n3. default\r\n4. implement\r\n', '1,2', '2,3', '3,4', '2,4', 'b'),
(8, 'What will be the output of the program?\r\nString d = "bookkeeper";\r\nd.substring(1,7);\r\nd = "w" + d;\r\nd.append("woo");  /* Line 4 */\r\nSystem.out.println(d);\r\n', 'wookkeewoo', ' wbookkeeper', 'wbookkeewoo', 'Compilation fails', 'd'),
(9, 'What will be the output of the program?\r\nint i = (int) Math.random();\r\n', 'i=0', 'i=1', 'value of i is undetermined', 'Statement causes a compile error', 'a'),
(10, 'What will be the output of the program?\r\nclass SC2 \r\n{\r\n    public static void main(String [] args) \r\n    {\r\n        SC2 s = new SC2();\r\n        s.start();\r\n    }\r\n\r\n    void start() \r\n    {\r\n        int a = 3;\r\n        int b = 4;\r\n        System.out.print(" " + 7 + 2 + " ");\r\n        System.out.print(a + b);\r\n        System.out.print(" " + a + b + " ");\r\n        System.out.print(foo() + a + b + " ");\r\n        System.out.println(a + b + foo());\r\n    }\r\n\r\n    String foo() \r\n    {\r\n        return "foo";\r\n    }\r\n}', '9 7 7 foo 7 7foo', '72 34 34 foo34 34foo', '9 7 7 foo34 34foo', '72 7 34 foo34 7foo', 'd'),
(11, 'Point out the error in the program?\r\n#include<stdio.h>\r\n#include<string.h>\r\nvoid modify(struct emp*);\r\nstruct emp\r\n{\r\n    char name[20];\r\n    int age;\r\n};\r\nint main()\r\n{\r\n    struct emp e = {"Sanjay", 35};\r\n    modify(&e);\r\n    printf("%s %d", e.name, e.age);\r\n    return 0;\r\n}\r\nvoid modify(struct emp *p)\r\n{\r\n     p ->age=p->age+2;\r\n}\r\n', 'Error: in structure', 'Error: in prototype declaration unknown struct emp', 'No error', 'None of above', 'b'),
(12, ' If int is 2 bytes wide.What will be the output of the program?\r\n#include <stdio.h>\r\nvoid fun(char**);\r\n\r\nint main()\r\n{\r\n    char *argv[] = {"ab", "cd", "ef", "gh"};\r\n    fun(argv);\r\n    return 0;\r\n}\r\nvoid fun(char **p)\r\n{\r\n    char *t;\r\n    t = (p+= sizeof(int))[-1];\r\n    printf("%s\n", t);\r\n}\r\n', 'ab', 'cd', 'ef', 'gh', 'b'),
(13, 'What will be the output of the following program?\r\n#include<iostream.h> \r\nvoid MyFunction(int a, int b = 40)\r\n{\r\n    cout<< " a = "<< a << " b = " << b << endl;\r\n}\r\nint main()\r\n{\r\n    MyFunction(20, 30);\r\n    return 0; \r\n}', 'a = 20 b = 40', 'a = 20 b = 30', 'a = 20 b = Garbage', 'a = Garbage b = 40', 'b'),
(14, 'Which standard library function will you use to find the last occurance of a character in a string in C?', 'strnchar', 'strchar', 'strchr', 'strrchr', 'd'),
(15, 'What will be the output of the program ?\r\n#include<stdio.h>\r\n#include<string.h>\r\n\r\nint main()\r\n{\r\n    char str[] = "HELLO\0WORLD\0";\r\n    printf("%s\n", str);\r\n    return 0;\r\n}', 'HELLO\0WORLD\0', 'HELLO', 'HELLO WORLD', 'WORLD', 'b'),
(16, 'What is (void*)0?', 'Representation of NULL pointer', 'Representation of void pointer', 'Error', 'None of above', 'a'),
(17, 'What will happen if in a C program you assign a value to an array element whose subscript exceeds the size of array?', 'The element will be set to 0.', 'The compiler would report an error.', 'The program may crash if some important data gets overwritten.', 'The array size would appropriately grow.', 'c'),
(18, 'Point out the error if any in the following program (Turbo C).\r\n#include<stdio.h>\r\n#include<stdarg.h>\r\nvoid display(int num, ...);\r\n\r\nint main()\r\n{\r\n    display(4, ''A'', ''a'', ''b'', ''c'');\r\n    return 0;\r\n}\r\nvoid display(int num, ...)\r\n{\r\n    char c; int j;\r\n    va_list ptr;\r\n    va_start(ptr, num);\r\n    for(j=1; j<=num; j++)\r\n    {\r\n        c = va_arg(ptr, char);\r\n        printf("%c", c);\r\n    }\r\n}\r\n', 'Error: unknown variable ptr', 'Error: Lvalue required for parameter', 'No error and print A a b c', 'No error and print 4 A a b c', 'c'),
(19, 'What will be the output of the program ?\r\n#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    char p[] = "%d\\n";\r\n    p[1] = ''c'';\r\n    printf(p, 65);\r\n    return 0;\r\n}\r\n', 'A', 'a', 'c', '65', 'a'),
(20, 'What will be output if you will compile and execute the following c code?\r\n\r\n#include<stdio.h>\r\nint main(){\r\n  int a=5;\r\n  float b=2.0;\r\ndouble c;\r\n  printf("%d",sizeof(++a+b+++c));\r\n  printf(" %d",a);\r\n  return 0;\r\n}', '2 6', '4 6', '8 5', 'Compile error', 'c'),
(21, 'What will be the output\r\n\r\n#include<stdio.h>\r\nint main()\r\n{int a,b=15,c=10;\r\na=sizeof(++b+--c+++b-++c);\r\nprintf("%d %d% d",a,b,c);\r\nreturn 0;\r\n}', '4 15 10', '4 17 10', '4 17 9', 'Compilation Error', 'a'),
(22, 'Total no of keywords in c language', '32', '31', '33', '30', 'c'),
(23, 'Output\r\n\r\n#include<stdio.h>\r\n#include<math.h>\r\nvoid main()\r\n{float a=0.9,b=1.2;\r\nprintf("%.1f",ceil(a-.5)+floor(b+.5));\r\n}', '2.5', '1.0', '1.5', '2.0', 'd'),
(24, 'Output\r\n\r\n#include<stdio.h>\r\nint main(){\r\n  char *url="c:	cin\rw.c";\r\n  printf("%s",url);\r\n  return 0;\r\n}', 'c:	cin\rw.', 'c: c inw.c', 'c:cinw.c', 'w.c in', 'e'),
(25, 'Output\r\n\r\n#define PRT printf("un");printf("predictable");\r\nint main(){\r\n  float a=5.5;\r\n  if(a==5.5)\r\n    PRT\r\n  else\r\n    printf("Not equal");\r\n  return 0;\r\n}', 'unpredictable', 'Not equal', 'Compiler error', 'None of above', 'c'),
(26, 'Output\r\n\r\nvoid main()\r\n{\r\n   char *str="I am rock";\r\n   printf("%*.*s",9,5,str);\r\n}', 'I am rock', 'Compile error', 'I am r', 'I am', 'd'),
(27, 'gotoxy() belongs to which header file', 'math.h', 'graphic.h', 'stdlib.h', 'conio.h', 'd'),
(28, 'gettime() belong to which header file', 'stdlib.h', 'conio.h', 'dos.h', 'not a function', 'c'),
(29, 'What will the code below print  -\r\n#include<stdio.h>\r\nint main()\r\n{\r\n printf("101102"");\r\n return 0;\r\n}', '01 02"', 'AB"', 'ef"', '002"', 'b'),
(30, 'What will be the value of z if -\r\nint z,x=5,y=-10,a=4,b=2;\r\nz = x++ - --y * b / a;', '5', '7', '10', '12', 'c'),
(31, 'What will be the output of the following program -\r\n#include<iostream.h>\r\nint main()\r\n{\r\n int a=10,b=20;\r\n if(!(a<b^(a+5)>10))\r\n cout<<" I win";\r\n else\r\n cout<<" You lose";\r\n return(0);\r\n}', '"I win"', '"You lose"', 'Blank Screen(No output)', 'Error', 'a'),
(32, 'Which function is used to read specified number of elements from a file', 'gets()', 'fileread()', 'fread()', 'readfile()', 'c'),
(33, 'Which of the statements is legal after declaring\r\nint n=44;\r\nconst int kn=44;\r\nint *const cptr=&n;\r\nconst int *ptrc=&kn;', '++ptrc', '++cptr', '++(*ptrc)', '++kn', 'a'),
(34, 'The function fmod() is used to find the remainder of a float division, it is defined in', 'iostream.h', 'stdio.h', 'math.h', 'stdlib.h', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `time_and_questions`
--

CREATE TABLE IF NOT EXISTS `time_and_questions` (
  `serial_num` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_questions` int(11) NOT NULL,
  `timer` int(11) NOT NULL,
  PRIMARY KEY (`serial_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `time_and_questions`
--

INSERT INTO `time_and_questions` (`serial_num`, `no_of_questions`, `timer`) VALUES
(1, 10, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
