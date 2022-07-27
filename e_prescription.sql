-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8883
-- Generation Time: Jul 12, 2022 at 02:36 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `e_prescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(15) NOT NULL,
  `user` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `user`, `description`, `date`) VALUES
(1, 'Omooga', 'Mild chest pain', '2021-08-12'),
(2, 'Omooga', 'Cough', '2022-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(15) NOT NULL,
  `disease` varchar(250) NOT NULL,
  `drug` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `disease`, `drug`) VALUES
(1, 'Ulcer', 'Omeprazole / Pantoprazole'),
(2, 'Diabetes', 'Metformin, Sulphonylureas, Acarbose (Glucobay)'),
(3, 'Cholera', 'Doxycycline, Azithromycin, Ciprofloxacin'),
(4, 'Typhoid', 'Ceftriaxone, Ampicilin, Chloramphenicol, Cotrimazole'),
(5, 'Malaria', 'Chloroquine, Co-arenate, Bimalaril, Tafenoquine'),
(6, 'Headache', 'Aspirin, Ibuprofen, Gebedol'),
(7, 'Body pains', 'Naproxen, Ibuprofen, Aspirin'),
(8, 'Fever', 'Acetaminophen, Ibuprofen'),
(9, 'Acne', 'Tetracycline, Erythromycin, Azithromycin'),
(10, 'Stomach ache', 'Loperamide, Panadol, Tylenol'),
(11, 'Appendicitis', 'Cefotan, Ampicilin, Mefotoxin'),
(12, 'Erythrodermic Psoriasis', 'Methotrexate'),
(13, 'Psoriatic arthropathy', 'Methotrexate'),
(14, 'Syphilis', 'Benzathine Penicillin 2.4 million units'),
(15, 'Herpes', 'Acyclovir or foscarnet'),
(16, 'Neurosyphilis', 'Aqueous Penicillin'),
(17, 'Arthritis mutilans', 'Etanarcept'),
(18, 'Chancroid', 'Ceftriaxone > Azithromycin'),
(19, 'Coccidiodomycosi', 'Itraconazole'),
(20, 'Open angle Glaucoma', 'Prostaglandins analogues'),
(21, 'Closed angle glaucoma', 'Acetazolamide'),
(22, 'Paracoccidiodomycosis', 'Itraconazole'),
(23, 'Vitiligo', 'Corticosteroids'),
(24, 'Meningitis', 'Ceftriaxone'),
(25, 'Neonatal meningitis', 'Ceftriaxone'),
(26, 'Febrile Seizures', 'Diazepam or intranasal Midazolam'),
(27, 'Epilepsy in pregnancy', 'Lamotrignine'),
(28, 'Toxoplasmosis', 'Pyrimethamine + sulfadoxine'),
(29, 'Hydrocephalus', 'Glycerol or acetazolamide'),
(30, 'Mycoplasma pneumonia', 'Azithromycin'),
(31, 'Plague', 'Streptomycin or Gentamycin'),
(32, 'Leptospirosis', 'Mild:Doxycycline | Severe: Penicillin'),
(33, 'Trench fever', 'Gentamycin+Doxycycline'),
(34, 'Dermatophyte', 'Griseofulvin'),
(35, 'ADHD', 'Methylphenidate'),
(36, 'Anxiety disorder', 'Cognitive behavior therapy(CBT)'),
(37, 'Meningococcus', 'PENICILLIN-G'),
(38, 'Staphylococcus', 'Penicillin'),
(39, 'H.influena meningitis', 'Ceftriaxone'),
(40, 'Diphtheria', 'Erythromycin'),
(41, 'Toxoplasmosis', 'Sulfadoxine + Pyrimethamine'),
(42, 'Acute gout', 'Indomethacin > colchicine'),
(43, 'Cystitis', 'Cotrimoxazole'),
(44, 'Pyelonephritis', 'Ciprofloxacin'),
(45, 'Drugs causing Pancreatitis', 'Azathioprine, 5-Mercaptopurine, Sulphonamides, Anti HIV drugs, Valproate, Estrogen, Tetracycline'),
(46, 'Primary biliary Cirrhosis', 'Liver Transplantation'),
(47, 'Hepatic encephalopathy', 'Lactulose'),
(48, 'Kidney stones', 'PCNL+ ESWL'),
(49, 'Onchocerca', 'Ivermectin'),
(50, 'Srongyloides (Thread worm)', 'Ivermectin'),
(51, 'Filariasis', 'Diethyl carbamazine'),
(52, 'Neurocysticercosis', 'Albendazole'),
(53, 'Liver fluke', 'Triclabendazole'),
(54, 'Lung flukes', 'Praziquentel'),
(55, 'Schistosomiasis', 'Praziquentel'),
(56, 'Malaria in pregnancy', 'Chloroquine / Quinine (when severe)'),
(57, 'Ovulatory DUB', 'NSAIDs + Transexanamic acid'),
(58, 'Anovulatory DUB', 'Progesterone'),
(59, 'Hot flashes', 'Estrogen'),
(60, 'Senile vaginitis', 'Topical estrogen'),
(61, 'Premenstrual Sx', 'SSRIs'),
(62, 'Bacterial vaginosis in Pregnancy', 'Metronidaole'),
(63, 'Pneumocystis in Pregnancy', 'Sulphamethaxozole + Trimethoprim'),
(64, 'Typhoid in Pregnancy', '3rd gen.Cephalosporins'),
(65, 'Syphilis in Pregnancy', 'Penicillin'),
(66, 'Gonorrhoe', 'Ceftriaxone'),
(67, 'Chlamydia', 'Azithromycin > Erythromycin'),
(68, 'Grp B Streptococcus', 'Penicillin > Ampicillin'),
(69, 'Appendicitis in Pregnancy', 'Appendicectomy'),
(70, 'Red degeneration', 'Conservative'),
(71, 'Thyrotoxicosis', 'Propylthiouracil'),
(72, 'Prolactinomas', 'Dopamine agonists'),
(73, 'Acute promyelocytic Leukemia', 'Trans Retinoic Acid / Arsenic Trioxide'),
(74, 'Chronic iron poisoning', 'Oral deferiprone'),
(75, 'Post coital contraception', 'Levonorgestrel'),
(76, 'Digitalis toxicity', 'Lignocaine'),
(77, 'Delirium tremens', 'Benzodiazepines'),
(78, 'Delirium', 'Antipsychotics + benzodiazepines'),
(79, 'PDA', 'Indomethacin'),
(80, 'Acetaminophen toxicity', 'N-Acetyl Cysteine'),
(81, 'Allergic rhinitis', 'Steroids'),
(82, 'Head lice', 'Permethrin 1% cream'),
(83, 'Migraine Prophylaxis', 'Propranolol'),
(84, 'Pseudotumor Cerebri', 'Acetazolamide'),
(85, 'Morning sickness', 'Doxylamine'),
(86, 'Urticaria', '2nd generation AntiHistaminics'),
(87, 'Heparin induced thrombocytopenia', 'Direct thrombin inhibitors(Argatroban)'),
(88, 'Hairy cell leukemia', 'Cladribine'),
(89, 'Pancreatic carcinoma', 'Gemcitabine'),
(90, 'GIST', 'Imatinib'),
(91, 'Sickle Cell Anemia', 'Hydroxyurea'),
(92, 'SIADH', 'Demeclocycline(Tetracycline)'),
(93, 'Prenatal Cong. adrenal hyperplasia', 'Dexamethasone'),
(94, 'Steroid dependant Nephrotic Sx', 'Cyclophosphomide'),
(95, 'Steroid Resistant Nephrotic Sx', 'Cyclosporine'),
(96, 'Diag. case of CAH', 'Hydrocortisone'),
(97, 'Tumor lysis Sx', 'Allopurinol'),
(98, 'Common cold', 'Analgesic, Antihistamine'),
(99, 'Heartburn', 'Dexlansoprazole, Esomeprazole, Lansoprazole, Pantoprazole'),
(100, 'Eye irritation', 'Naphazoline / Pheniramine');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `year_of_birth` int(50) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `prescriptions` int(50) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `profile_complete` tinyint(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `year_of_birth`, `nationality`, `prescriptions`, `password`, `profile_complete`, `date_created`) VALUES
(1, NULL, NULL, 'Omooga', 'omooga@gmail.com', NULL, NULL, 3, '$2y$10$THRtGyTmZuPLIrQgEvcTt.33MXuMBdlcylNxcRoKRTILqiu/KOxZW', 0, '0000-00-00'),
(2, NULL, NULL, 'Oxlade', 'ox@mail.com', NULL, NULL, NULL, '$2y$10$aiNeEicqgex7NOn8huHJU.bWTVJrXzbdWLSgEOMaBeZWwEeCSPste', 0, '0000-00-00'),
(3, NULL, NULL, 'Mikky', 'lopez@gmail.com', NULL, NULL, NULL, '$2y$10$JtIn/d3XcHW0B9zvb.J71uRouKKgfZqiKWedts6SJE2zV5cphGZN.', 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

