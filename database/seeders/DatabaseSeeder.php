<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Factor;
use App\Models\User;
use App\Models\Vulnerability;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        /**
         * A01:2021
         */
        $a01_2021 = Vulnerability::create([
            'code' => 'A01:2021',
            'title' => 'Broken Access Control',
            'overview' => 'Moving up from the fifth position, 94% of applications were tested for some form of broken access control with the average incidence rate of 3.81%, and has the most occurrences in the contributed dataset with over 318k. Notable Common Weakness Enumerations (CWEs) included are CWE-200: Exposure of Sensitive Information to an Unauthorized Actor, CWE-201: Insertion of Sensitive Information Into Sent Data, and CWE-352: Cross-Site Request Forgery.',
            'description' => "Access control enforces policy such that users cannot act outside of their intended permissions. Failures typically lead to unauthorized information disclosure, modification, or destruction of all data or performing a business function outside the user's limits. Common access control vulnerabilities include:\n
                \tViolation of the principle of least privilege or deny by default, where access should only be granted for particular capabilities, roles, or users, but is available to anyone.\n
                \tBypassing access control checks by modifying the URL (parameter tampering or force browsing), internal application state, or the HTML page, or by using an attack tool modifying API requests.\n
                \tPermitting viewing or editing someone else's account, by providing its unique identifier (insecure direct object references)\n\tAccessing API with missing access controls for POST, PUT and DELETE.\n
                \tElevation of privilege. Acting as a user without being logged in or acting as an admin when logged in as a user.\n\tMetadata manipulation, such as replaying or tampering with a JSON Web Token (JWT) access control token, or a cookie or hidden field manipulated to elevate privileges or abusing JWT invalidation.\n
                \tCORS misconfiguration allows API access from unauthorized/untrusted origins.\n\tForce browsing to authenticated pages as an unauthenticated user or to privileged pages as a standard user.",
            'image_url' => '/storage/a01.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 34,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 55.97,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 3.81,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 6.92,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 5.93,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 94.55,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 47.72,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 318487,
            'vulnerability_id' => $a01_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 19013,
            'vulnerability_id' => $a01_2021->id,
        ]);

        /**
         * A02:2021
         */
        $a02_2021 = Vulnerability::create([
            'code' => 'A02:2021',
            'title' => 'Cryptographic Failures',
            'overview' => 'Shifting up one position to #2, previously known as Sensitive Data Exposure, which is more of a broad symptom rather than a root cause, the focus is on failures related to cryptography (or lack thereof). Which often lead to exposure of sensitive data. Notable Common Weakness Enumerations (CWEs) included are CWE-259: Use of Hard-coded Password, CWE-327: Broken or Risky Crypto Algorithm, and CWE-331 Insufficient Entropy.',
            'description' => "The first thing is to determine the protection needs of data in transit and at rest. For example, passwords, credit card numbers, health records, personal information, and business secrets require extra protection, mainly if that data falls under privacy laws, e.g., EU's General Data Protection Regulation (GDPR), or regulations, e.g., financial data protection such as PCI Data Security Standard (PCI DSS). For all such data:\n
                \tIs any data transmitted in clear text? This concerns protocols such as HTTP, SMTP, FTP also using TLS upgrades like STARTTLS. External internet traffic is hazardous. Verify all internal traffic, e.g., between load balancers, web servers, or back-end systems.\n
                \tAre any old or weak cryptographic algorithms or protocols used either by default or in older code?\n
                \tAre default crypto keys in use, weak crypto keys generated or re-used, or is proper key management or rotation missing? Are crypto keys checked into source code repositories?\n
                \tIs encryption not enforced, e.g., are any HTTP headers (browser) security directives or headers missing?\n
                \tIs the received server certificate and the trust chain properly validated?\n
                \tAre initialization vectors ignored, reused, or not generated sufficiently secure for the cryptographic mode of operation? Is an insecure mode of operation such as ECB in use? Is encryption used when authenticated encryption is more appropriate?\n
                \tAre passwords being used as cryptographic keys in absence of a password base key derivation function?\n
                \tIs randomness used for cryptographic purposes that was not designed to meet cryptographic requirements? Even if the correct function is chosen, does it need to be seeded by the developer, and if not, has the developer over-written the strong seeding functionality built into it with a seed that lacks sufficient entropy/unpredictability?\n
                \tAre deprecated hash functions such as MD5 or SHA1 in use, or are non-cryptographic hash functions used when cryptographic hash functions are needed?\n
                \tAre deprecated cryptographic padding methods such as PKCS number 1 v1.5 in use?\n
                \tAre cryptographic error messages or side channel information exploitable, for example in the form of padding oracle attacks?\n
                \nSee ASVS Crypto (V7), Data Protection (V9), and SSL/TLS (V10)",
            'image_url' => '/storage/a02.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 29,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 46.44,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 4.49,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 7.29,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 6.81,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 79.33,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 34.85,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 233788,
            'vulnerability_id' => $a02_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 3075,
            'vulnerability_id' => $a02_2021->id,
        ]);

        /**
         * A03:2021
         */
        $a03_2021 = Vulnerability::create([
            'code' => 'A03:2021',
            'title' => 'Injection',
            'overview' => 'Injection slides down to the third position. 94% of the applications were tested for some form of injection with a max incidence rate of 19%, an average incidence rate of 3%, and 274k occurrences. Notable Common Weakness Enumerations (CWEs) included are CWE-79: Cross-site Scripting, CWE-89: SQL Injection, and CWE-73: External Control of File Name or Path.',
            'description' => "An application is vulnerable to attack when:\n
                \tUser-supplied data is not validated, filtered, or sanitized by the application.\n
                \tDynamic queries or non-parameterized calls without context-aware escaping are used directly in the interpreter.\n
                \tHostile data is used within object-relational mapping (ORM) search parameters to extract additional, sensitive records.\n
                \tHostile data is directly used or concatenated. The SQL or command contains the structure and malicious data in dynamic queries, commands, or stored procedures.\n
                \nSome of the more common injections are SQL, NoSQL, OS command, Object Relational Mapping (ORM), LDAP, and Expression Language (EL) or Object Graph Navigation Library (OGNL) injection. The concept is identical among all interpreters. Source code review is the best method of detecting if applications are vulnerable to injections. Automated testing of all parameters, headers, URL, cookies, JSON, SOAP, and XML data inputs is strongly encouraged. Organizations can include static (SAST), dynamic (DAST), and interactive (IAST) application security testing tools into the CI/CD pipeline to identify introduced injection flaws before production deployment.",
            'image_url' => '/storage/a03.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 33,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 19.09,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 3.37,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 7.25,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 7.15,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 94.04,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 47.9,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 274228,
            'vulnerability_id' => $a03_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 32078,
            'vulnerability_id' => $a03_2021->id,
        ]);

        /**
         * A04:2021
         */
        $a04_2021 = Vulnerability::create([
            'code' => 'A04:2021',
            'title' => 'Insecure Design',
            'overview' => 'A new category for 2021 focuses on risks related to design and architectural flaws, with a call for more use of threat modeling, secure design patterns, and reference architectures. As a community we need to move beyond "shift-left" in the coding space to pre-code activities that are critical for the principles of Secure by Design. Notable Common Weakness Enumerations (CWEs) include CWE-209: Generation of Error Message Containing Sensitive Information, CWE-256: Unprotected Storage of Credentials, CWE-501: Trust Boundary Violation, and CWE-522: Insufficiently Protected Credentials.',
            'description' => 'Insecure design is a broad category representing different weaknesses, expressed as “missing or ineffective control design.” Insecure design is not the source for all other Top 10 risk categories. There is a difference between insecure design and insecure implementation. We differentiate between design flaws and implementation defects for a reason, they have different root causes and remediation. A secure design can still have implementation defects leading to vulnerabilities that may be exploited. An insecure design cannot be fixed by a perfect implementation as by definition, needed security controls were never created to defend against specific attacks. One of the factors that contribute to insecure design is the lack of business risk profiling inherent in the software or system being developed, and thus the failure to determine what level of security design is required.',
            'image_url' => '/storage/a04.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 40,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 24.19,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 3.00,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 6.46,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 6.78,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 77.25,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 42.51,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 262407,
            'vulnerability_id' => $a04_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 2691,
            'vulnerability_id' => $a04_2021->id,
        ]);

        /**
         * A05:2021
         */
        $a05_2021 = Vulnerability::create([
            'code' => 'A05:2021',
            'title' => 'Security Misconfiguration',
            'overview' => 'Moving up from #6 in the previous edition, 90% of applications were tested for some form of misconfiguration, with an average incidence rate of 4.%, and over 208k occurrences of a Common Weakness Enumeration (CWE) in this risk category. With more shifts into highly configurable software, it\'s not surprising to see this category move up. Notable CWEs included are CWE-16 Configuration and CWE-611 Improper Restriction of XML External Entity Reference.',
            'description' => "The application might be vulnerable if the application is:\n
                \tMissing appropriate security hardening across any part of the application stack or improperly configured permissions on cloud services.\n
                \tUnnecessary features are enabled or installed (e.g., unnecessary ports, services, pages, accounts, or privileges).\n
                \tDefault accounts and their passwords are still enabled and unchanged.\n
                \tError handling reveals stack traces or other overly informative error messages to users.\n
                \tFor upgraded systems, the latest security features are disabled or not configured securely.\n
                \tThe security settings in the application servers, application frameworks (e.g., Struts, Spring, ASP.NET), libraries, databases, etc., are not set to secure values.\n
                \tThe server does not send security headers or directives, or they are not set to secure values.\n
                \tThe software is out of date or vulnerable (see A06:2021-Vulnerable and Outdated Components).\n
                \nWithout a concerted, repeatable application security configuration process, systems are at a higher risk.",
            'image_url' => '/storage/a05.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 20,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 19.84,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 4.51,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 8.12,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 6.56,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 89.58,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 44.84,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 208387,
            'vulnerability_id' => $a05_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 789,
            'vulnerability_id' => $a05_2021->id,
        ]);

        /**
         * A06:2021
         */
        $a06_2021 = Vulnerability::create([
            'code' => 'A06:2021',
            'title' => 'Vulnerable and Outdated Components',
            'overview' => 'It was #2 from the Top 10 community survey but also had enough data to make the Top 10 via data. Vulnerable Components are a known issue that we struggle to test and assess risk and is the only category to not have any Common Vulnerability and Exposures (CVEs) mapped to the included CWEs, so a default exploits/impact weight of 5.0 is used. Notable CWEs included are CWE-1104: Use of Unmaintained Third-Party Components and the two CWEs from Top 10 2013 and 2017.',
            'description' => "You are likely vulnerable:\n
                \tIf you do not know the versions of all components you use (both client-side and server-side). This includes components you directly use as well as nested dependencies.\n
                \tIf the software is vulnerable, unsupported, or out of date. This includes the OS, web/application server, database management system (DBMS), applications, APIs and all components, runtime environments, and libraries.\n
                \tIf you do not scan for vulnerabilities regularly and subscribe to security bulletins related to the components you use.\n
                \tIf you do not fix or upgrade the underlying platform, frameworks, and dependencies in a risk-based, timely fashion. This commonly happens in environments when patching is a monthly or quarterly task under change control, leaving organizations open to days or months of unnecessary exposure to fixed vulnerabilities.\n
                \tIf software developers do not test the compatibility of updated, upgraded, or patched libraries.\n
                \tIf you do not secure the components’ configurations (see A05:2021-Security Misconfiguration).",
            'image_url' => '/storage/a06.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 3,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 27.96,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 8.77,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 5.00,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 5.00,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 51.78,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 22.47,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 30457,
            'vulnerability_id' => $a06_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 0,
            'vulnerability_id' => $a06_2021->id,
        ]);

        /**
         * A07:2021
         */
        $a07_2021 = Vulnerability::create([
            'code' => 'A07:2021',
            'title' => 'Identification and Authentication Failures',
            'overview' => 'Previously known as Broken Authentication, this category slid down from the second position and now includes Common Weakness Enumerations (CWEs) related to identification failures. Notable CWEs included are CWE-297: Improper Validation of Certificate with Host Mismatch, CWE-287: Improper Authentication, and CWE-384: Session Fixation.',
            'description' => "Confirmation of the user's identity, authentication, and session management is critical to protect against authentication-related attacks. There may be authentication weaknesses if the application:\n
                \tPermits automated attacks such as credential stuffing, where the attacker has a list of valid usernames and passwords.\n
                \tPermits brute force or other automated attacks.\n
                \tPermits default, weak, or well-known passwords, such as \"Password1\" or \"admin/admin\".\n
                \tUses weak or ineffective credential recovery and forgot-password processes, such as \"knowledge-based answers\", which cannot be made safe.\n
                \tUses plain text, encrypted, or weakly hashed passwords data stores (see A02:2021-Cryptographic Failures).\n
                \tHas missing or ineffective multi-factor authentication.\n
                \tExposes session identifier in the URL.\n
                \tReuse session identifier after successful login.\n
                \tDoes not correctly invalidate Session IDs. User sessions or authentication tokens (mainly single sign-on (SSO) tokens) aren't properly invalidated during logout or a period of inactivity.",
            'image_url' => '/storage/a07.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 22,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 14.84,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 2.55,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 7.4,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 6.5,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 79.51,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 45.72,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 132195,
            'vulnerability_id' => $a07_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 3897,
            'vulnerability_id' => $a07_2021->id,
        ]);

        /**
         * A08:2021
         */
        $a08_2021 = Vulnerability::create([
            'code' => 'A08:2021',
            'title' => 'Software and Data Integrity Failures',
            'overview' => 'A new category for 2021 focuses on making assumptions related to software updates, critical data, and CI/CD pipelines without verifying integrity. One of the highest weighted impacts from Common Vulnerability and Exposures/Common Vulnerability Scoring System (CVE/CVSS) data. Notable Common Weakness Enumerations (CWEs) include CWE-829: Inclusion of Functionality from Untrusted Control Sphere, CWE-494: Download of Code Without Integrity Check, and CWE-502: Deserialization of Untrusted Data.',
            'description' => 'Software and data integrity failures relate to code and infrastructure that does not protect against integrity violations. An example of this is where an application relies upon plugins, libraries, or modules from untrusted sources, repositories, and content delivery networks (CDNs). An insecure CI/CD pipeline can introduce the potential for unauthorized access, malicious code, or system compromise. Lastly, many applications now include auto-update functionality, where updates are downloaded without sufficient integrity verification and applied to the previously trusted application. Attackers could potentially upload their own updates to be distributed and run on all installations. Another example is where objects or data are encoded or serialized into a structure that an attacker can see and modify is vulnerable to insecure deserialization.',
            'image_url' => '/storage/a08.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 10,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 16.67,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 2.05,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 6.94,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 7.94,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 75.04,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 45.35,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 47972,
            'vulnerability_id' => $a08_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 1152,
            'vulnerability_id' => $a08_2021->id,
        ]);

        /**
         * A09:2021
         */
        $a09_2021 = Vulnerability::create([
            'code' => 'A09:2021',
            'title' => 'Security Logging and Monitoring Failures',
            'overview' => 'Security logging and monitoring came from the Top 10 community survey (#3), up slightly from the tenth position in the OWASP Top 10 2017. Logging and monitoring can be challenging to test, often involving interviews or asking if attacks were detected during a penetration test. There isn\'t much CVE/CVSS data for this category, but detecting and responding to breaches is critical. Still, it can be very impactful for accountability, visibility, incident alerting, and forensics. This category expands beyond CWE-778 Insufficient Logging to include CWE-117 Improper Output Neutralization for Logs, CWE-223 Omission of Security-relevant Information, and CWE-532 Insertion of Sensitive Information into Log File.',
            'description' => "Returning to the OWASP Top 10 2021, this category is to help detect, escalate, and respond to active breaches. Without logging and monitoring, breaches cannot be detected. Insufficient logging, detection, monitoring, and active response occurs any time:\n
                \tAuditable events, such as logins, failed logins, and high-value transactions, are not logged.\n
                \tWarnings and errors generate no, inadequate, or unclear log messages.\n
                \tLogs of applications and APIs are not monitored for suspicious activity.\n
                \tLogs are only stored locally.\n
                \tAppropriate alerting thresholds and response escalation processes are not in place or effective.\n
                \tPenetration testing and scans by dynamic application security testing (DAST) tools (such as OWASP ZAP) do not trigger alerts.\n
                \tThe application cannot detect, escalate, or alert for active attacks in real-time or near real-time.\n
                \nYou are vulnerable to information leakage by making logging and alerting events visible to a user or an attacker (see A01:2021-Broken Access Control).",
            'image_url' => '/storage/a09.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 4,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 19.23,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 6.51,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 6.87,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 4.99,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 53.67,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 39.97,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 53615,
            'vulnerability_id' => $a09_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 242,
            'vulnerability_id' => $a09_2021->id,
        ]);

        /**
         * A10:2021
         */
        $a10_2021 = Vulnerability::create([
            'code' => 'A10:2021',
            'title' => 'Server-Side Request Forgery (SSRF)',
            'overview' => 'This category is added from the Top 10 community survey (#1). The data shows a relatively low incidence rate with above average testing coverage and above-average Exploit and Impact potential ratings. As new entries are likely to be a single or small cluster of Common Weakness Enumerations (CWEs) for attention and awareness, the hope is that they are subject to focus and can be rolled into a larger category in a future edition.',
            'description' => "SSRF flaws occur whenever a web application is fetching a remote resource without validating the user-supplied URL. It allows an attacker to coerce the application to send a crafted request to an unexpected destination, even when protected by a firewall, VPN, or another type of network access control list (ACL).\n
                \nAs modern web applications provide end-users with convenient features, fetching a URL becomes a common scenario. As a result, the incidence of SSRF is increasing. Also, the severity of SSRF is becoming higher due to cloud services and the complexity of architectures.",
            'image_url' => '/storage/a10.png',
            'user_id' => $user->id,
        ]);

        Factor::create([
            'name' => 'CWEs Mapped',
            'value' => 1,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Incidence Rate (%)',
            'value' => 2.72,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Incidence Rate (%)',
            'value' => 2.72,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Exploit',
            'value' => 8.28,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Weighted Impact',
            'value' => 6.72,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Max Coverage (%)',
            'value' => 53.67,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Avg Coverage (%)',
            'value' => 67.72,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Total Occurrences',
            'value' => 9503,
            'vulnerability_id' => $a10_2021->id,
        ]);

        Factor::create([
            'name' => 'Total CVEs',
            'value' => 385,
            'vulnerability_id' => $a10_2021->id,
        ]);
    }
}
