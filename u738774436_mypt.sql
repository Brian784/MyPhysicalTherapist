-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 04:48 PM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u738774436_mypt`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(20) UNSIGNED NOT NULL,
  `User_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_Time` time NOT NULL,
  `Location` text COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_ID`, `User_ID`, `Therapist_ID`, `Appointment_Date`, `Appointment_Time`, `Location`, `isApproved`) VALUES
(1, 2, 500000000, '0000-00-00', '06:00:00', 'H.V Dela Costa, Makati City', 1),
(2, 3, 500000001, '0000-00-00', '06:00:00', 'Quezon City, Metro Manila', 1),
(3, 6, 500000002, '0000-00-00', '09:12:00', 'Pasay, Metro Manila', 0),
(4, 6, 500000003, '0000-00-00', '04:30:00', 'Makati, Kalakhang Maynila', 1),
(5, 1, 500000000, '0000-00-00', '02:34:00', 'Manila, Metro Manila', 1);

-- --------------------------------------------------------

--
-- Table structure for table `arcticle_comments`
--

CREATE TABLE `arcticle_comments` (
  `Article_Comment_ID` int(20) UNSIGNED NOT NULL,
  `Account_ID` int(20) UNSIGNED NOT NULL,
  `Article_ID` int(10) UNSIGNED NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `arcticle_comments`
--

INSERT INTO `arcticle_comments` (`Article_Comment_ID`, `Account_ID`, `Article_ID`, `Time_Stamp`, `Comment`, `isApproved`) VALUES
(1, 500000001, 3, '2018-05-28 08:14:40', 'Wow, this is such a helpful article!', 1),
(2, 500000002, 5, '2018-05-28 08:14:44', 'Interesting!', 1),
(3, 500000003, 2, '2018-05-28 08:14:48', 'Thank you for giving this information!', 1),
(4, 500000004, 2, '2018-05-28 08:14:51', 'I really liked this article. Also, would like to clarify how about this certain topic? how long does it take for a sprain to heal?. Thank you!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_ID` int(10) UNSIGNED NOT NULL,
  `Therapist_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Article_Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Article` text COLLATE utf8_unicode_ci NOT NULL,
  `TimePublished` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_ID`, `Therapist_ID`, `Article_Title`, `Article`, `TimePublished`) VALUES
(2, '1', 'The Seven Most Common Sports Injuries', '\r\n\r\nAfter a sedentary work week, end-zone catches and 36-hole weekends can take their toll in common sports injuries. The seven most common sports injuries are:\r\n\r\n    Ankle sprain\r\n    Groin pull\r\n    Hamstring strain\r\n    Shin splints\r\n    Knee injury: ACL tear\r\n    Knee injury: Patellofemoral syndrome — injury resulting from the repetitive movement of your kneecap against your thigh bone\r\n    Tennis elbow (epicondylitis)\r\n\r\nTo see how to prevent and treat these common sports injuries — and to learn when it\'s time to look further than your medicine cabinet to treat sports injuries— read on.\r\nThe most common sports injuries are strains and sprains\r\n\r\nSprains are injuries to ligaments, the tough bands connecting bones in a joint. Suddenly stretching ligaments past their limits deforms or tears them. Strains are injuries to muscle fibers or tendons, which anchor muscles to bones. Strains are called “pulled muscles” for a reason: Over-stretching or overusing a muscle causes tears in the muscle fibers or tendons.\r\n\r\n“Think of ligaments and muscle-tendon units like springs,” says William Roberts, MD, sports medicine physician at the University of Minnesota and spokesman for the American College of Sports Medicine. “The tissue lengthens with stress and returns to its normal length — unless it is pulled too far out of its normal range.”', '0000-00-00 00:00:00'),
(3, '3', 'Minor Injury: Treat at Home or Call the Doc?', 'What\'s minor to some may not be so minor to others. Depending on one\'s skill level and confidence level (often related), an injury could be worthy of a trip to the ER or less than an adhesive bandage. What others might find overwhelming may be much ado about nothing to you—or the other way around.\r\n\r\nHere\'s a list of common injuries often described as minor in order to help you decide how to handle them, though any of these could also be major calamities. Follow the links to see how to handle each minor emergency. If you do need to seek help, make sure you get the level that you really need. In some cases, it\'s better to call 911 than trying to drive yourself to the ER.\r\n\r\nPlus, there are many situations in which you shouldn\'t bother going to the doctor\'s office at all and should just reach for the phone to call 911.\r\n\r\nRegardless of this list, your best judge is your gut. If you think your injury needs a professional\'s opinion, by all means call the doctor or go to the ER. If you think it\'s a matter of life and death, don\'t ever hesitate to call 911. If you\'re not sure either way, read on, but always remember when it comes to medical emergencies: If in doubt, call \'em out.\r\n1\r\nHow Bad Is That Burn?\r\n\r\nWhether it\'s from a barbecue, an oven, the sun or a curling iron like this, everybody gets burned at some point. By far, most burns don\'t need to be treated at a burn center or get skin grafts, but they can certainly get that bad. Burn severity is based on how much skin is damaged. The measurement is done by the depth of the burn combined with the surface area affected. It\'s a complicated assessment process to determine whether burns are critical or not. It can be simpler to decide whether a burn needs to be seen by a professional at all.\r\n\r\nMost small first-degree burns, and sometimes even second-degree burns, don\'t need a healthcare provider. On the other hand, any burn that appears very deep should be professionally evaluated. Some burns require immediate attention and you should call 911 immediately:\r\n\r\n    Burns to the face\r\n    Burns that circle all the way around the hands or feet\r\n    Burns to the genitals\r\n    Second-degree burns covering an area larger than one whole arm or about the size of the back\r\n\r\n2\r\nBruised More Than Your Ego?\r\n\r\nBruises range from minor inconveniences to severely incapacitating. Discoloration is the most noticeable aspect, but that\'s only part of a bruise. They also cause swelling and might lead to a loss of function in severe enough cases.\r\n\r\nThe trick to avoiding bruises (besides avoiding injury in the first place) is to treat any injury with RICE as soon as you get hurt. Most bruises can be treated at home without calling the doctor.\r\n3\r\nCuts, Scrapes, and Scratches\r\n\r\nSmall cuts and scratches can be handled by rinsing with tap water, applying an antibiotic ointment (optional), and applying an adhesive bandage.\r\n\r\nMore severe lacerations need to be evaluated for the possibility of needing stitches. Depending on how bad it is, you may want to see a healthcare provider. Most cuts can be handled at an urgent care center, and unless it\'s bleeding severely, you don\'t need to call 911 for a cut.\r\n4\r\nBlack Eyes\r\n\r\nBlack eyes are the bane of all little league ball players. Who hasn\'t gotten a ball to the eye?\r\n\r\nMost black eyes are easily treated at home—as long as the injury is just to the area around the eye and there is no bleeding or direct injury to the eyeball. If you see any of the following, call 911 immediately:\r\n\r\n    bleeding from the eyeball\r\n    loss of consciousness\r\n    two black eyes (especially if the injury was to a part of the head other than the face)\r\n    confusion\r\n    loss of vision or blurred vision\r\n    vertigo (dizziness)\r\n\r\n5\r\nRemoving Splinters: Minor Surgery for a Minor Injury\r\n\r\nSplinters are probably the most annoying of minor injuries. In most cases, a splinter can be easily removed at home. The most important thing to remember about splinter removal is to keep it clean. Always wash your hands before trying to remove a splinter. Always wash the area around the splinter. And, always make sure you are using clean tools (tweezers and a needle).\r\n\r\nIf a splinter is left alone, it will usually work its way out of the skin. I know I have a hard time leaving splinters alone, though, and let\'s face it: wherever the splinter is stuck will be the area of your body that you hit most often for the next two weeks. The most common complication of splinters is infection. Watch for redness, heat, oozing and swelling. If you see signs of infection on any injury where the skin is broken, it\'s time to see a doctor.\r\n\r\nSubungual splinters (splinters under a fingernail or toenail) may need a healthcare provider to remove them. Not to mention they hurt like crazy.\r\n6\r\nBlisters\r\n\r\nFriction blisters—the kind you get from long walks in bad shoes—are easily treated at home. There are three steps: clean it, drain it, and dress it.\r\n\r\nThe most important thing to remember about blisters is to fix the problem that caused the blister when you fix the blister. Otherwise, you will make things worse.\r\n7\r\nSprains\r\n\r\nAny joint can be sprained, but ankles are by far the most common. It isn\'t necessary to see a doctor to treat every sprain, but sometimes it can be hard to tell the difference between a sprain and a fracture.\r\n\r\nUltimately, there should be improvement in a couple of days in the case of a sprain. It won\'t be healed, but it should start feeling a little better fairly quickly. If it\'s not, then it might be worth calling the doctor for a professional opinion.\r\n\r\nSome sprains can be serious and often those are indistinguishable from dislocations or fractures and should be treated like broken bones.\r\n', '0000-00-00 00:00:00'),
(4, '2', 'Top 10 Most Common Sports Injuries', 'Whether you are a highly-trained athlete or a weekend warrior, there’s always a chance you could get injured. Unfortunately, when injuries happen, it can be hard to know what you’ve tweaked or how to treat it. Brian McEvoy, PT, UnityPoint Health, counts down the most common sports injuries, from the least common to the most common, along with possible causes, treatments and recovery strategies.\r\n10. Hip Flexor Strain\r\n\r\nThe hip flexors are muscles found on the upper-front side of your thigh. The main functions of the hip flexor muscles are to lift the knee toward your trunk, as well as assist moving your leg toward and away from the other leg. Hip flexors can be weak in individuals who sit a great deal at work or can become weak and stiff in individuals who have poor sitting posture. Sports injuries to this muscle group can be caused by sprinting, running inclines and activities with quick turns and sudden starts.\r\n\r\n“Common symptoms of a hip flexor strain would include pain with raising the leg, such as stair climbing and transfers in and out of a car, as well as cutting and running activities,” McEvoy says. “Someone who experiences a hip flexor strain might notice bruising in the front of the upper thigh and groin area.”\r\n\r\nA hip flexor strain is best treated by rest and icing for 15 to 20 minutes at a time for the first 48 to 72 hours. After the first three recovery days, the injured athlete could apply heat for 15 to 20 minutes followed by lying down and performing gentle heel slides and hip flexor stretches. If the pain, symptoms and limited activity remain after two weeks, the individual should seek out physical therapy for pain and swelling control and instruction in specific hip-strengthening exercises to regain power, range of motion and movement.\r\n9. ACL Tear or Strain\r\n\r\nThe ACL, anterior cruciate ligament, is one of the major stabilizing ligaments of the knee. The most common cause of sports injuries for an ACL strain is slowing down and trying to cut, pivot or change directions. Ligaments on the inside of the knee are often torn with the ACL injury, making it a devastating event.\r\n\r\nComplaints of instability when walking or turning corners, as well as increased swelling in the knee would be common ACL tear symptoms. A slight ACL strain or tear can be healed without surgery using rest and ice, as the scar tissue helps heal the ligament and the knee becomes more stable. A complete ACL tear would require surgery and a few months of recovery time with aggressive physical therapy before the athlete would be able to return to activity.\r\n8. Concussion\r\n\r\nA concussion can be defined as injury to the brain, due a blow to the head where the brain is jarred or shaken. Concussions are serious injuries that should not be taken lightly. An athlete who experiences a concussion should seek out a certified athletic trainer or a physician with experience treating concussions. Common concussion symptoms can include:\r\n\r\n    Headache\r\n    Confusion\r\n    Dizziness\r\n    Nausea and/or vomiting\r\n    Slurred speech\r\n    Sensitivity to light\r\n    Delayed response to questions\r\n\r\n“Athletes diagnosed with a concussion should never return to their sport without being medically cleared by a health care professional trained in concussion evaluation,” McEvoy says.\r\n\r\nCommon concussion treatments include rest, reduced activities requiring mental or physical stress and slowly increasing physical activities, as long as symptoms do not return.\r\n7. Groin Pull\r\n\r\nA groin pull is also called a groin strain. The groin muscles run from the upper-inner thigh to the inner thigh right above the knee. Groin muscles pull the legs together and are often injured with quick side-to-side movements and/or a lack of flexibility. The injured athlete might notice difficulty with lateral movements, getting in and out of cars, as well as tenderness or bruising in the groin or inner thigh.\r\n\r\nGroin pull treatment includes rest and icing for 15 to 20 minutes periodically during the first 72 hours. After the first three days, the athlete could use heat for 15 to 20 minutes periodically, followed by gentle, proper groin stretching and range of motion exercises, for example, by making snow angels on the floor.\r\n6. Shin Splints\r\n\r\nAthletes with shin splints complain of pain in the lower leg bone, or the tibia. Shin splints are most often found in athletes who are runners or participate in activities with a great deal of running, such as soccer. Athletes typically get shin splints diagnosed early in their season, as they increase activities or mileage too quickly. Shin splints are best prevented and/or treated with rest, icing and gradually increasing running activities. Purchasing shoes with good arch support can also reduce pain in the shins and help with recovery.\r\n5. Sciatica\r\n\r\nSciatica is back pain that also travels down the back of the leg or even to the feet. This radiating pain can additionally be associated with numbness, burning and tingling down the leg. Sciatica can be seen in athletes who are in a flexed forward posture, such as cyclists, or athletes who perform a great deal of trunk rotation in the swing sports, like golf and tennis. The back pain and radiating pain can be caused by a bulging disc or a pinched nerve. Sometimes, rest, stretching the back and hamstrings and laying on your stomach can help alleviate the symptoms. If pain, numbness or tingling persists for more than two weeks, then the athlete should seek out a medical professional, such as a physical therapist, to help alleviate sciatica symptoms.\r\n4. Hamstring Strain\r\n\r\nThe hamstring muscle is located on the back of the thigh. Unfortunately, the hamstring muscles can be tight and are susceptible to a strain, which is also called a pulled muscle. Poor stretching techniques or lack of stretching can be the cause of a hamstring tear/strain. Often, an athlete with a hamstring tear will experience bruising in the back of the thigh or the knee. Rest and icing are the common early treatment techniques for a pulled hamstring, followed by gentle stretching and strengthening to prevent another injury. If the pain persists more than two weeks, the athlete could try physical therapy to use ultrasound or other methods to promote healing the pulled muscle.\r\n3. Tennis or Golf Elbow\r\n\r\nTennis and golfer’s elbow is usually seen with athletes performing a great deal of gripping activities. It can be labeled as an overuse sports injury, also known as medial or lateral epicondylitis. Due to the repetitive action, the tendons of the forearm can become inflamed and make any wrist or hand motions extremely painful. Often, athletes will complain of a lack of grip strength. Early treatment options for tennis or golf elbow involve rest and icing the inflamed area. Doctors will often prescribe anti-inflammatory medication, or even a brace, to try to take pressure off the area and prevent further elbow injuries. Stretching techniques and other strengthening exercises applied by an occupational or physical therapist can help to break down the stiffness and gradually build strength, returning athletes to their sporting activities.\r\n2. Shoulder Injury\r\n\r\nShoulder injuries cover a large number of sports injuries from dislocations, misalignment, strains on muscles and sprains of ligaments.\r\n\r\n“The shoulder is the weakest joint of the body and is subject to a great deal of force during athletic activities. Many shoulder injuries can be caused by either a lack of flexibility, strength or stabilization,” McEvoy says.\r\n\r\nShoulder injury treatment starts with rest and icing to help with pain and swelling relief. Any pain persisting for more than two weeks should be evaluated by a physical therapist.\r\n1. Patellofemoral Syndrome\r\n\r\nThe majority of sports injuries involve the lower body, particularly knee injuries. One of the most common knee injuries is called patellofemoral syndrome. This diagnosis can be caused by a slip or a fall onto the knees, swelling of the knee joint or a muscle imbalance. The patella, or kneecap, should travel in the groove at the end of the femur or thigh bone. Sometimes, a fall onto the knee can cause swelling, leading to a muscle imbalance of the two major muscles that aid in proper tracking of the kneecap in the groove. This muscle imbalance can create more swelling, making the tracking problem even worse. Rest and ice can help with knee injury pain and swelling. Gentle isometric, or static, strengthening exercises for the inner thigh muscle and gently stretching muscles for the outer or lateral thigh muscles can help to correct the muscle imbalance. If knee injury pain or dysfunction continues for more than two weeks, a referral to a physical therapist could help with more aggressive stretching and strengthening. A physical therapist may use knee taping or bracing techniques to aid with proper tracking.\r\n\r\nIf you or your child experience any sports-related injury, trust the team at UnityPoint Health to get you back on your feet.', '0000-00-00 00:00:00'),
(5, '5', 'Common Physiotherapy Treatment Techniques', 'Physiotherapy Treatment Techniques\r\n\r\nphysiotherapy brisbane\r\n\r\nThere are well over 20 different treatment approaches commonly used by your physiotherapist. \r\nHands-on Physiotherapy Techniques\r\n\r\nYour physiotherapist may be trained in hands-on physiotherapy techniques such as:\r\n\r\n    Joint mobilisation (gentle gliding) techniques, \r\n    Joint manipulation, \r\n    Physiotherapy Instrument Mobilisation (PIM).\r\n    Minimal Energy Techniques (METs), \r\n    Muscle stretching, \r\n    Neurodynamics, \r\n    Massage and soft tissue techniques\r\n\r\nIn fact, your physiotherapist has training that includes techniques used by most hands-on professions such as chiropractors, osteopaths, massage therapists, and kinesiologists.\r\nPhysiotherapy Taping\r\n\r\nYour physiotherapist is a highly skilled professional who utilises strapping and taping techniques to prevent injuries. \r\n\r\nSome physiotherapists are also skilled in the use of kinesiology taping.\r\nAcupuncture and Dry Needling\r\n\r\nMany physiotherapists have acquired additional training in the field of acupuncture and dry needling to assist pain relief and muscle function.\r\nPhysiotherapy Exercises\r\n\r\nPhysiotherapists have been trained in the use of exercise therapy to strengthen your muscles and improve your function. Physiotherapy exercises have been scientifically proven to be one of the most effective ways that you can solve or prevent pain and injury. \r\n\r\nYour physiotherapist is an expert in the prescription of the \"best exercises\" for you and the most appropriate \"exercise dose\" for you depending on your rehabilitation status. Your physiotherapist will incorporate essential components of pilates, yoga and exercise physiology to provide you with the best result.\r\n\r\nThey may even use Real-Time Ultrasound Physiotherapy so that you can watch your muscles contract on a screen as you correctly retrain them.\r\nBiomechanical Analysis\r\n\r\nBiomechanical assessment, observation and diagnostic skills are paramount to the best treatment. \r\n\r\nYour physiotherapist is a highly skilled health professional with superb diagnostic skills to detect and ultimately avoid musculoskeletal and sports injuries. Poor technique or posture is one of the most common sources of repeat injury. \r\nSports Physiotherapy\r\n\r\nSports physio requires an extra level of knowledge and physiotherapy skill to assist injury recovery, prevent injury and improve performance. For the best advice, consult a Sports Physiotherapist.\r\nWorkplace Physiotherapy\r\n\r\nNot only can your physiotherapist assist you at sport, they can also assist you at work. Ergonomics looks at the best postures and workstation set up for your body at work. Whether it be lifting technique improvement, education programs or workstation setups, your physiotherapist can help you.', '0000-00-00 00:00:00'),
(6, '6', ' The 8 Best Physical Therapy Methods Explained', 'From breaks to bruises to bursitis, physical therapists have a special knack for assessing the human body and helping restore it back to optimal performance. Armed with cutting edge equipment and a huge background of knowledge, PTs can help diagnose and treat many common ailments and movement disorders. But despite having a slew of cool toys (laser therapy anyone?), their most useful tool for treatment may be their hands. Read on for the need-to-know on the most popular treatment options for whatever injury might come along.\r\nThe 8 Best Physical Therapy Methods Explained\r\nLet’s Get Physical — The Assessment\r\n\r\nThe first step in the treatment process of any good physical therapist is evaluation. Expect therapists to ask detailed questions about how the injury came about, but also do some expert sleuth work (since the injured area may be a result and not the starting point of poor movement). According to Dr. Mike Reinold, a Boston-based PT and therapist for the Red Sox, therapists may be able to reduce the pain quickly, but that will only be temporary unless they address the root cause of the problem.\r\n\r\nAlthough patients may come to see therapists for a variety of causes, low back aches, knee pain, and overuse injuries are among the most common complaints. Following a thorough investigation, therapists will begin to lay out a treatment plan, which will commonly include passive modalities (ice, heat, laser therapy, and electrical stimulation to name a few). But more often than not, manual therapy — a term that includes many methods of restoring tissue function like massage, stretching, and exercise — is the foundation for the assessment and treatment of an injury, Reinold says. Just don’t anticipate hopping (or running, swimming, or lifting) back into activity right away. According to Dr. Eugene Babenko, a physical therapist based in New York City, the average length of care for musculoskeletal (read: bone and muscle injuries) can be anywhere from four to six weeks.\r\nPutting the Pieces Together — The Treatment\r\nPhysiotherapy Feet\r\n\r\nReady to get going on the road to recovery? Before heading to your local PT office blindly, Greatist consulted with Reinold and Babenko to break down the most effective treatment methods for a variety of ailments, big and small. Note: The following section covers general assessments, not meant to take the place of professional medical advice, which will vary on a case-by-case basis.\r\nManual Therapy\r\n\r\nBest for: Any injury\r\n\r\nThis hands-on approach separates physical therapists from other health practitioners. Although manual therapy may refer to many things, therapists usually employ common tactics like stretching, massage, and hands-on strengthening exercises to reeducate the body into proper movement and mechanics. “Manual therapy is a prime method to removing movement restrictions and helping patients move better,” according to Dr. Reinold. He also advises that manual therapy should form the backbone of any treatment plan, not modalities like ice and electric stimulation.\r\nIce\r\n\r\nBest for: Injuries involving inflammation and swelling\r\n\r\nIce can be a major component of injury treatment. By constricting blood vessels after application, ice is an effective way to reduce and even prevent inflammation immediately following an injury. Cold therapy can also leave the joint more mobile and enhance manual therapy. Although it’s difficult to nail down the most effective protocol, applying cold packs to inflamed areas has been shown to significantly reduce swelling in soft tissue injuries .\r\nHeat\r\n\r\nBest for: Injuries involving muscular spasms and tightness\r\n\r\nApplying heat has been shown to decrease pain and increase mobility after some injuries — mainly those involving soft tissue like muscles, tendons, and ligaments . By making the tissue more pliable, the therapist can better stretch the affected area. Note: Heat is just one tool to help the therapist be more effective, Dr. Reinold says, it shouldn’t be the main focus of a treatment plan.\r\nUltrasound\r\n\r\nBest for: Connective tissue injuries\r\n\r\nBy using sound waves (undetectable to the human ear) to generate heat deep in the body, ultrasound therapy can help loosen up tissues in preparation for manual therapy or exercise. How it works: Therapists use a wand (unfortunately not the magic kind!) to apply the sound waves directly — and safely — to the skin. Ultrasound has also been shown to increase ligament-healing speed in our furry counterparts (read: rats), though more studies are needed to show whether the same holds true for us .\r\nLow-Level Laser\r\n\r\nBest for: Muscular or connective tissue injuries\r\n\r\nLaser therapy uses specific wavelengths of light to stimulate healing (well below the skin so you don’t feel a thing). Best-case scenario: The treatment can help reduce inflammation, muscle fatigue, and pain . It can also allow the therapist to move the affected joint around easier with less discomfort.\r\nTraction\r\n\r\nBest for: Disc herniation\r\n\r\nWhen we stand, our spine is consistently bearing our weight making recovery from back pain difficult, Dr. Reinold says. Traction involves separating vertebrae to allow more space for nerves and less compression on disc cartilage. Some research shows that traction can be effective for reducing pain and enhancing quality of life in patients with a herniated lumbar disc . And since it doesn’t involve going under the knife, this can be an effective treatment option for those who can’t afford a long recovery.\r\nFunctional Electrical Stimulation\r\n\r\nBest for: Restoring muscular strength\r\n\r\nIt’s electric — no really. Electrical stimulation, also referred to as ESTIM, is a common treatment option to restore muscular function following a traumatic injury. By applying a minor but steady electrical stimulus, therapists can cause contractions from muscles that may otherwise remain dormant. This leads to restoring proper movement and function sooner than relying on exercise alone. While ESTIM can’t restore movement in every case, research shows it can speed recovery following ACL and total knee replacement surgery over the course of a few weeks . Additional research confirms the use of ESTIM as an effective treatment option to restore function in hemiplegic patients (those with one side of the body paralyzed) .', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_account`
--

CREATE TABLE `therapist_account` (
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `License_Id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `isValidated` tinyint(1) NOT NULL,
  `License_Type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Profile_Picture` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `therapist_account`
--

INSERT INTO `therapist_account` (`Therapist_ID`, `Email`, `Password`, `First_Name`, `Last_Name`, `License_Id`, `isValidated`, `License_Type`, `Profile_Picture`, `Contact_Number`, `Description`) VALUES
(1, 'rod.brouhard@gmail.com', '123454', 'Rod', 'Brouhard', '122346', 1, 'Paramedic', '1.jpg', '092826273', 'Rod Brouhard is a paramedic, journalist, researcher, educator and advocate for emergency medical service providers and patients. He started as a volunteer firefighter in 1987 and fell in love with emergency medical services. Rod\'s been viewing life through the flashing glow of emergency lights ever since. Today, Rod leads a team of dedicated EMS professionals in San Francisco, California.'),
(2, 'kellymaura1@gmail.com', 'spraintrain', 'Maura', 'Kelly', '123', 1, 'therapist', '2.jpg', '8976654', 'A well known therapist'),
(3, 'omar.khalid@gmail.com', '987654', 'Omar', 'Khalid', '5678', 1, 'Surgeon', '3.jpg', '098734562', 'Im a surgeon who knows about physiotherapy.'),
(4, 'john.miller@gmail.com', '0987654edfg 	', 'John', 'Miller', '3456', 1, 'Therapist', '4.jpg', '0987653793', 'John Miller is a clinical physiotherapist with almost 30 years experience in sports injury and musculoskeletal management.\r\n\r\nJohn graduated as a physiotherapist from the University of Queensland in 1988. He has worked locally and abroad gaining hospital and private practice experience. During his time in the UK, he was a Senior Physiotherapist at The Royal London Hospital Musculoskeletal and Sports Injury Unit.\r\n\r\nHe was appointed as a Physiotherapist for the 2018 Commonwealth Games supporting the Athletics, Beach Volleyball, Cycling, Hockey, Triathlon, Para-triathlon, Marathon and Para-marathon programs.'),
(5, 'jeremy.duvall@gmail.com', 'dkadkal', 'Jeremey', 'Duvall', '324567', 1, 'Therapist', '5.jpg', '0987634562', 'Jeremey is a personal trainer and fitness writer based out of the outdoor mecca of Boulder, Colorado. When he’s not helping to inform, inspire, and educate others through writing, he’s usually covering the mountains either by foot, two wheels, or skis. He’s known for having a strong love for coffee and cooking - sometimes combining the two.'),
(6, 'DocsHaveMercy@ypmail.com', 'infinity', 'Doc', 'Mercy', '555', 1, 'Surgeon', '6.jpg', '921221', 'A skilled doctor with his own technique'),
(7, 'mathew.hoffman@gmail.com', '12345', 'Matthew', 'Hoffman', '12345', 1, 'Therapist', '0.jpg', '0908932324', 'The Physiotherapy Board has today launched the first-ever comprehensive set of standards for the profession in New Zealand.');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_saved_videos`
--

CREATE TABLE `therapist_saved_videos` (
  `Record_ID` int(11) UNSIGNED NOT NULL,
  `Video_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Time_Saved` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapist_schedule`
--

CREATE TABLE `therapist_schedule` (
  `Schedule_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Working_Day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Hospital_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `therapist_schedule`
--

INSERT INTO `therapist_schedule` (`Schedule_ID`, `Therapist_ID`, `Working_Day`, `Start_Time`, `End_Time`, `Hospital_Name`) VALUES
(2, 0, 'M', '06:00:00', '12:20:00', 'Bondoc Peninsula District Hospital'),
(3, 3, 'F', '04:00:00', '14:00:00', 'Cebu City Medical Center'),
(4, 2, 'TH', '10:34:13', '03:00:00', 'Balamban District Hospital'),
(5, 2, 'WED', '05:00:00', '12:00:00', 'Badian District Hospital '),
(6, 1, 'M', '12:00:00', '05:00:00', 'Dumdum Medical Clinic');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `User_ID` int(20) UNSIGNED NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Profile_Picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Contact_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Age` tinyint(3) UNSIGNED NOT NULL,
  `Gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`User_ID`, `Email`, `Password`, `First_Name`, `Last_Name`, `Profile_Picture`, `Contact_Number`, `Age`, `Gender`) VALUES
(500000000, 'martin.jackson123@gmail.com', 'ownjdewba', 'Martin', 'Jackson', '500000000.jpg', '0936276183', 34, 'M'),
(500000001, 'ironman@yahoo.com', 'abc123', 'Tony', 'Stark', '500000001.jpg', '87000', 45, 'M'),
(500000002, 'brianxu784@Gmail.com', 'Havanaunana', 'Ryan', 'Reynolds', '500000006.jpg', '09152016010', 21, 'M'),
(500000003, 'jamesraynor@gmail.com', 'marine', 'James', 'Raynor', 'default.jpg', '0998 888 9432', 40, 'M'),
(500000004, 'amera.ayman@gmail.com', 'hduwomsa', 'Amera', 'Ibrahim', '500000004.jpg', '0987654352', 18, 'F'),
(500000005, 'sarah.james@gmail.com', 'oijaewhsfs', 'Sarah', 'James', '500000005.jpg', '09874526223', 30, 'F'),
(500000006, 'coco.loco@gmail.com', 'dajsdeosdfad245543', 'Coco', 'Loco', '500000002.jpg', '0987345623', 23, 'M'),
(500000007, 'alaa.elrawi@gmail.com', 'asojdwqnd312jnda', 'Alaa', 'Elrawi', '500000007.jpg', '09845672324', 26, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `user_saved_videos`
--

CREATE TABLE `user_saved_videos` (
  `Record_ID` int(20) UNSIGNED NOT NULL,
  `Video_ID` int(20) UNSIGNED NOT NULL,
  `User_ID` int(20) UNSIGNED NOT NULL,
  `Time_Saved` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_saved_videos`
--

INSERT INTO `user_saved_videos` (`Record_ID`, `Video_ID`, `User_ID`, `Time_Saved`) VALUES
(1, 7, 500000000, '2018-05-29 16:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `Video_Comment_ID` int(10) UNSIGNED NOT NULL,
  `Account_ID` int(20) UNSIGNED NOT NULL,
  `Video_ID` int(20) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `isApprove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_comments`
--

INSERT INTO `video_comments` (`Video_Comment_ID`, `Account_ID`, `Video_ID`, `Time_Stamp`, `Comment`, `isApprove`) VALUES
(1, 500000000, 4, '2018-05-28 08:13:07', 'It\'s a very helpful video', 1),
(3, 3, 4, '2018-05-28 08:17:23', 'what a nice video', 1),
(5, 500000004, 4, '2018-05-28 08:13:23', 'I like the way that you explain', 1),
(8, 500000006, 4, '2018-05-28 08:13:39', 'WATCH NOW!', 1),
(12, 500000007, 3, '2018-05-28 08:13:35', 'Why so serious?', 1),
(14, 500000001, 4, '2018-05-28 08:13:11', 'Hi tony! ', 1),
(19, 500000003, 7, '2018-05-28 08:13:19', ':) Nice video', 1),
(20, 4, 6, '2018-05-28 11:06:34', 'I learned a lot', 1),
(21, 500000000, 7, '2018-05-29 16:18:19', 'She is so beautiful', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_library`
--

CREATE TABLE `video_library` (
  `Video_ID` int(20) UNSIGNED NOT NULL,
  `Therapist_ID` int(20) UNSIGNED NOT NULL,
  `Video_Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Video_Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Video_URL` text COLLATE utf8_unicode_ci NOT NULL,
  `Body_Part` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TimePublished` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_library`
--

INSERT INTO `video_library` (`Video_ID`, `Therapist_ID`, `Video_Title`, `Video_Description`, `Video_URL`, `Body_Part`, `TimePublished`) VALUES
(3, 2, 'Instant Headache Relief in Seconds with Self Massage Technique', 'The majority of all headaches are tension related headaches. The blockage of blood circulation along with contraction/shortening of muscles is what causes this condition. This simple technique can take away most tension related headaches in seconds.', '3.mp4', 'upper', '2018-05-15 03:00:00'),
(4, 3, 'Amazing Technique for Upper Neck Pain - MUST WATCH!', ':) Guys try this out', '4.mp4', 'upper', '2018-05-16 05:17:00'),
(5, 1, 'Plica syndrome: Signs, symptoms and treatment of this uncomfortable knee pain', 'Please note: I don\'t respond to questions and requests for specific medical advice left in the comments to my videos. I receive too many to keep up (several hundred per week), and legally I can\'t offer specific medical advice to people who aren\'t my patients (see below). If you want to ask a question about a specific injury you have, leave it in the comments below, and I might answer it in an upcoming Ask Dr. Geier video. If you need more detailed information on your injury, go to my Resources page: https://www.drdavidgeier.com/resources/', '5.mp4', 'lower', '2018-05-16 00:18:31'),
(6, 4, 'Best Ankle Rehabilitation Exercises For Those Recovering From Ankle Injury', 'As someone who has engaged in exercise and athletic activity for most of my life, I\'ve put quite a few miles on my feet. I\'m sure I\'m not alone when saying that decades of pounding and abuse have added up to more than a few ankle injuries. The same mantra I\'m given by doctors and physical therapists is \'make sure you continue to do your exercises.’', '6.mp4', 'lower', '2018-05-25 08:00:19'),
(7, 5, 'Top 5 Wrist Pain Relief Tips', 'Sponsored Content: Have a wrist injury or pain from arthritis, carpal tunnel syndrome, sprains, or overuse injuries? Here are some ways to help relieve the pain. Use code DOCTORJOX to get $30.50 OFF the Thermotex Platinum + FREE shipping at https://www.thermotex.com/us/product/... Here are my top five ways to relieve wrist pain. The first stretch is for your wrist flexors and extensors. Start off with your arm straight out in front of you. Bring your wrists upward to stretch your wrist flexors. If you need more of a stretch, push up with the other hand. Now bring your wrists downward or into flexion to stretch the wrist extensors. Hold each stretch for 30 seconds and do them three times each. The second way to relieve pain is to use Far Infrared Heat. Far infrared heats the area with light vs. actual heat, so it can penetrate deeper into the area. A traditional heating pad usually only heats about 0.25 cm, but far infrared can go up to 6 cm, or 2.36 inches. It helps increase the circulation to the area to provide temporary relief. ', '7.mp4', 'upper', '2018-05-16 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`);

--
-- Indexes for table `arcticle_comments`
--
ALTER TABLE `arcticle_comments`
  ADD PRIMARY KEY (`Article_Comment_ID`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`);

--
-- Indexes for table `therapist_account`
--
ALTER TABLE `therapist_account`
  ADD PRIMARY KEY (`Therapist_ID`);

--
-- Indexes for table `therapist_saved_videos`
--
ALTER TABLE `therapist_saved_videos`
  ADD PRIMARY KEY (`Record_ID`);

--
-- Indexes for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  ADD PRIMARY KEY (`Schedule_ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_saved_videos`
--
ALTER TABLE `user_saved_videos`
  ADD PRIMARY KEY (`Record_ID`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`Video_Comment_ID`);

--
-- Indexes for table `video_library`
--
ALTER TABLE `video_library`
  ADD PRIMARY KEY (`Video_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `arcticle_comments`
--
ALTER TABLE `arcticle_comments`
  MODIFY `Article_Comment_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `therapist_account`
--
ALTER TABLE `therapist_account`
  MODIFY `Therapist_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `therapist_saved_videos`
--
ALTER TABLE `therapist_saved_videos`
  MODIFY `Record_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapist_schedule`
--
ALTER TABLE `therapist_schedule`
  MODIFY `Schedule_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `User_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500000008;

--
-- AUTO_INCREMENT for table `user_saved_videos`
--
ALTER TABLE `user_saved_videos`
  MODIFY `Record_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `Video_Comment_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `video_library`
--
ALTER TABLE `video_library`
  MODIFY `Video_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
