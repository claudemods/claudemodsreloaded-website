#include <QApplication>
#include <QMainWindow>
#include <QWidget>
#include <QVBoxLayout>
#include <QHBoxLayout>
#include <QLabel>
#include <QPushButton>
#include <QScrollArea>
#include <QStackedWidget>
#include <QPropertyAnimation>
#include <QGraphicsOpacityEffect>
#include <QTimer>
#include <QClipboard>
#include <QDesktopServices>
#include <QUrl>
#include <QNetworkAccessManager>
#include <QNetworkReply>
#include <QPixmap>
#include <QMovie>
#include <QStyle>
#include <QScreen>
#include <QGuiApplication>
#include <QMessageBox>
#include <QFile>
#include <QTextStream>

class MainWindow : public QMainWindow {
    Q_OBJECT

public:
    MainWindow(QWidget *parent = nullptr) : QMainWindow(parent) {
        setupUI();
        setupConnections();
        loadStylesheet();
    }

private:
    QWidget *mainWidget;
    QStackedWidget *stackedWidget;
    QWidget *mainPage;
    QWidget *galleryPage;
    QWidget *ccmPage;
    QWidget *guidePage;
    QPushButton *backButton;

    void setupUI() {
        // Main window settings
        setWindowTitle("ClaudeMods Reloaded");
        resize(900, 800);
        move(QGuiApplication::primaryScreen()->geometry().center() - rect().center());

        // Create main widget and layout
        mainWidget = new QWidget(this);
        QVBoxLayout *mainLayout = new QVBoxLayout(mainWidget);
        mainLayout->setContentsMargins(5, 5, 5, 5);
        mainLayout->setSpacing(5);

        // Create stacked widget for pages
        stackedWidget = new QStackedWidget(mainWidget);
        mainLayout->addWidget(stackedWidget);

        // Create pages
        createMainPage();
        createGalleryPage();
        createCCMPage();
        createGuidePage();

        // Add pages to stacked widget
        stackedWidget->addWidget(mainPage);
        stackedWidget->addWidget(galleryPage);
        stackedWidget->addWidget(ccmPage);
        stackedWidget->addWidget(guidePage);

        // Back button
        backButton = new QPushButton("← Back", this);
        backButton->setFixedSize(100, 40);
        backButton->setStyleSheet(
            "QPushButton {"
            "  background-color: #ff0000;"
            "  color: white;"
            "  border: none;"
            "  border-radius: 5px;"
            "  font-weight: bold;"
            "  padding: 5px;"
            "}"
            "QPushButton:hover {"
            "  background-color: #cc0000;"
            "}"
        );
        backButton->move(20, 20);
        backButton->hide();

        setCentralWidget(mainWidget);
    }

    void createMainPage() {
        mainPage = new QWidget();
        QVBoxLayout *layout = new QVBoxLayout(mainPage);
        layout->setContentsMargins(10, 10, 10, 10);
        layout->setSpacing(10);

        // Top button row
        QHBoxLayout *buttonRow = new QHBoxLayout();
        buttonRow->setSpacing(6);

        QPushButton *galleryBtn = createButton("Distributions");
        QPushButton *guideBtn = createButton("Guide to Linux");
        QPushButton *ccmBtn = createButton("ClaudeModsCCM");
        QPushButton *supportBtn = createButton("Support My Work");

        buttonRow->addWidget(galleryBtn);
        buttonRow->addWidget(guideBtn);
        buttonRow->addWidget(ccmBtn);
        buttonRow->addWidget(supportBtn);
        layout->addLayout(buttonRow);

        // Header GIF
        QLabel *headerGif = new QLabel();
        headerGif->setAlignment(Qt::AlignCenter);
        QMovie *movie = new QMovie();
        movie->setFileName(":/claudemods.gif"); // You'll need to add this resource
        headerGif->setMovie(movie);
        movie->start();
        layout->addWidget(headerGif);

        // Badge container
        QVBoxLayout *badgeContainer = new QVBoxLayout();
        badgeContainer->setSpacing(6);

        // Badge rows
        QHBoxLayout *badgeRow1 = new QHBoxLayout();
        badgeRow1->setSpacing(6);
        badgeRow1->addWidget(createBadge("Gta Mods", "red"));
        badgeRow1->addWidget(createBadge("OS Linux", "red"));
        badgeContainer->addLayout(badgeRow1);

        QHBoxLayout *badgeRow2 = new QHBoxLayout();
        badgeRow2->setSpacing(6);
        badgeRow2->addWidget(createBadge("DISTRO Arch", "teal"));
        badgeRow2->addWidget(createBadge("DISTRO CachyOS", "highlight"));
        badgeContainer->addLayout(badgeRow2);

        QHBoxLayout *badgeRow3 = new QHBoxLayout();
        badgeRow3->setSpacing(6);
        badgeRow3->addWidget(createBadge("claudemods v3.0", "gold"));
        badgeRow3->addWidget(createBadge("gta inside v1.5", "gold"));
        badgeRow3->addWidget(createBadge("Google Drive v2.0", "gold"));
        badgeRow3->addWidget(createBadge("Sourceforge v2.0", "gold"));
        badgeRow3->addWidget(createBadge("Github v2.2", "gold"));
        badgeRow3->addWidget(createBadge("Pling v2.0", "gold"));
        badgeContainer->addLayout(badgeRow3);

        layout->addLayout(badgeContainer);

        // Welcome text
        QLabel *welcomeText = new QLabel("Welcome to the official site for claudemods's mods");
        welcomeText->setStyleSheet("color: #ff0000; font-weight: bold; font-size: 14px;");
        welcomeText->setAlignment(Qt::AlignCenter);
        layout->addWidget(welcomeText);

        // Description text
        QLabel *descriptionText = new QLabel(
            "At claudemods, I am based in the UK, in Manchester.<br>"
            "Providing You With Custom Linux Distributions, Linux Applications, Linux Scripts And Pc Game Mods.<br>"
            "I've Been Making Scripts Since Late 2019! All Linux Applications And Linux Scripts Have Been Built Using "
            "<a href='https://www.deepseek.com' style='color: #00FFFF; text-decoration: none; font-weight: bold; border-bottom: 1px dotted #00FFFF;'>https://www.deepseek.com</a> since July 2024<br>"
            "All New Arch Iso's Are Created With My Own Iso Creator Tools"
        );
        descriptionText->setStyleSheet("color: #00FFFF; font-size: 13px;");
        descriptionText->setAlignment(Qt::AlignCenter);
        descriptionText->setOpenExternalLinks(true);
        descriptionText->setTextFormat(Qt::RichText);
        layout->addWidget(descriptionText);

        // Repo section
        QVBoxLayout *repoSection = new QVBoxLayout();
        repoSection->setSpacing(10);

        QHBoxLayout *repoButtons = new QHBoxLayout();
        repoButtons->setSpacing(6);
        QPushButton *v1RepoBtn = createRepoButton("V1 Repo");
        QPushButton *v2RepoBtn = createRepoButton("V2 Repo");
        repoButtons->addWidget(v1RepoBtn);
        repoButtons->addWidget(v2RepoBtn);
        repoSection->addLayout(repoButtons);

        // V1 Repo options
        v1RepoOptions = new QWidget();
        QVBoxLayout *v1RepoLayout = new QVBoxLayout(v1RepoOptions);
        v1RepoLayout->setSpacing(3);
        v1RepoLayout->addWidget(createRepoOption("v1-kernels-tested"));
        v1RepoLayout->addWidget(createRepoOption("v1-base"));
        v1RepoLayout->addWidget(createRepoOption("v1-core"));
        v1RepoOptions->hide();
        repoSection->addWidget(v1RepoOptions);

        // V2 Repo options
        v2RepoOptions = new QWidget();
        QVBoxLayout *v2RepoLayout = new QVBoxLayout(v2RepoOptions);
        v2RepoLayout->setSpacing(3);
        v2RepoLayout->addWidget(createRepoOption("v2-kernels-rolling"));
        v2RepoLayout->addWidget(createRepoOption("v2-base"));
        v2RepoLayout->addWidget(createRepoOption("v2-core"));
        v2RepoLayout->addWidget(createRepoOption("v2-desktop"));
        v2RepoOptions->hide();
        repoSection->addWidget(v2RepoOptions);

        layout->addLayout(repoSection);

        // Copy section
        QVBoxLayout *copySection = new QVBoxLayout();
        copySection->setSpacing(10);

        QHBoxLayout *copyButtons = new QHBoxLayout();
        copyButtons->setSpacing(6);
        QPushButton *copyV1Btn = createRepoButton("Copy V1 Repo Config");
        QPushButton *copyV2Btn = createRepoButton("Copy V2 Repo Config");
        copyButtons->addWidget(copyV1Btn);
        copyButtons->addWidget(copyV2Btn);
        copySection->addLayout(copyButtons);

        copyNotification = new QLabel("Configuration copied to clipboard!");
        copyNotification->setStyleSheet("color: #00FF00; font-weight: bold; font-size: 11px;");
        copyNotification->setAlignment(Qt::AlignCenter);
        copyNotification->hide();
        copySection->addWidget(copyNotification);

        layout->addLayout(copySection);

        // Spacer to push everything up
        layout->addStretch();
    }

    void createGalleryPage() {
        galleryPage = new QWidget();
        QVBoxLayout *layout = new QVBoxLayout(galleryPage);
        layout->setContentsMargins(20, 20, 20, 20);
        layout->setSpacing(20);

        // Close button
        QPushButton *closeBtn = new QPushButton("× Close");
        closeBtn->setStyleSheet(
            "QPushButton {"
            "  background-color: #e06c75;"
            "  color: white;"
            "  border: none;"
            "  padding: 5px 10px;"
            "  border-radius: 3px;"
            "  font-weight: bold;"
            "}"
            "QPushButton:hover {"
            "  background-color: #9a0028;"
            "}"
        );
        closeBtn->setFixedSize(80, 30);
        layout->addWidget(closeBtn, 0, Qt::AlignRight);

        // Badges
        QHBoxLayout *badgesLayout = new QHBoxLayout();
        badgesLayout->setSpacing(10);
        badgesLayout->addStretch();
        
        QLabel *archBadge = new QLabel();
        archBadge->setPixmap(QPixmap(":/arch_badge.png")); // You'll need to add this resource
        badgesLayout->addWidget(archBadge);
        
        QLabel *cachyBadge = new QLabel();
        cachyBadge->setPixmap(QPixmap(":/cachy_badge.png")); // You'll need to add this resource
        badgesLayout->addWidget(cachyBadge);
        
        badgesLayout->addStretch();
        layout->addLayout(badgesLayout);

        // DeepSeek logo
        QLabel *deepseekLogo = new QLabel();
        deepseekLogo->setPixmap(QPixmap(":/deepseek_logo.png")); // You'll need to add this resource
        deepseekLogo->setAlignment(Qt::AlignCenter);
        layout->addWidget(deepseekLogo);

        // Gallery content
        QScrollArea *scrollArea = new QScrollArea();
        scrollArea->setWidgetResizable(true);
        QWidget *galleryContent = new QWidget();
        QVBoxLayout *galleryLayout = new QVBoxLayout(galleryContent);
        galleryLayout->setSpacing(40);

        // Apex CKGE Full
        QLabel *apexTitle = new QLabel("Apex CKGE Full");
        apexTitle->setStyleSheet("color: #00FFFF; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;");
        apexTitle->setAlignment(Qt::AlignCenter);
        galleryLayout->addWidget(apexTitle);

        QLabel *apexImage1 = createGalleryImage(":/apex1.webp");
        galleryLayout->addWidget(apexImage1);

        QLabel *apexImage2 = createGalleryImage(":/apex2.png");
        galleryLayout->addWidget(apexImage2);

        // SpitFire CKGE Minimal
        QLabel *spitfireTitle = new QLabel("SpitFire CKGE Minimal");
        spitfireTitle->setStyleSheet("color: #800020; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;");
        spitfireTitle->setAlignment(Qt::AlignCenter);
        galleryLayout->addWidget(spitfireTitle);

        QLabel *spitfireImage1 = createGalleryImage(":/spitfire1.webp");
        galleryLayout->addWidget(spitfireImage1);

        QLabel *spitfireImage2 = createGalleryImage(":/spitfire2.png");
        galleryLayout->addWidget(spitfireImage2);

        // SpitFire CKGBE Minimal
        QLabel *spitfireCkgbeTitle = new QLabel("SpitFire CKGBE Minimal");
        spitfireCkgbeTitle->setStyleSheet("color: #00FFFF; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;");
        spitfireCkgbeTitle->setAlignment(Qt::AlignCenter);
        galleryLayout->addWidget(spitfireCkgbeTitle);

        QLabel *spitfireCkgbeImage1 = createGalleryImage(":/spitfire_ckgbe1.webp");
        galleryLayout->addWidget(spitfireCkgbeImage1);

        QLabel *spitfireCkgbeImage2 = createGalleryImage(":/spitfire_ckgbe2.png");
        galleryLayout->addWidget(spitfireCkgbeImage2);

        // Apex Gamester
        QLabel *apexGamesterTitle = new QLabel("Apex Gamester");
        apexGamesterTitle->setStyleSheet("color: #FFD700; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;");
        apexGamesterTitle->setAlignment(Qt::AlignCenter);
        galleryLayout->addWidget(apexGamesterTitle);

        QLabel *apexGamesterImage = createGalleryImage(":/apex_gamester.webp");
        galleryLayout->addWidget(apexGamesterImage);

        galleryLayout->addStretch();
        scrollArea->setWidget(galleryContent);
        layout->addWidget(scrollArea);
    }

    void createCCMPage() {
        ccmPage = new QWidget();
        QVBoxLayout *layout = new QVBoxLayout(ccmPage);
        layout->setContentsMargins(20, 20, 20, 20);
        layout->setSpacing(20);

        // Close button
        QPushButton *closeBtn = new QPushButton("× Close");
        closeBtn->setStyleSheet(
            "QPushButton {"
            "  background-color: #e06c75;"
            "  color: white;"
            "  border: none;"
            "  padding: 5px 10px;"
            "  border-radius: 3px;"
            "  font-weight: bold;"
            "}"
            "QPushButton:hover {"
            "  background-color: #9a0028;"
            "}"
        );
        closeBtn->setFixedSize(80, 30);
        layout->addWidget(closeBtn, 0, Qt::AlignRight);

        // Badges
        QHBoxLayout *badgesLayout = new QHBoxLayout();
        badgesLayout->setSpacing(10);
        badgesLayout->addStretch();
        
        QLabel *archBadge = new QLabel();
        archBadge->setPixmap(QPixmap(":/arch_badge.png")); // You'll need to add this resource
        badgesLayout->addWidget(archBadge);
        
        QLabel *cachyBadge = new QLabel();
        cachyBadge->setPixmap(QPixmap(":/cachy_badge.png")); // You'll need to add this resource
        badgesLayout->addWidget(cachyBadge);
        
        badgesLayout->addStretch();
        layout->addLayout(badgesLayout);

        // DeepSeek logo
        QLabel *deepseekLogo = new QLabel();
        deepseekLogo->setPixmap(QPixmap(":/deepseek_logo.png")); // You'll need to add this resource
        deepseekLogo->setAlignment(Qt::AlignCenter);
        layout->addWidget(deepseekLogo);

        // DeepSeek text
        QLabel *deepseekText = new QLabel(
            "<div style='color: #00FFFF; text-align: center;'>"
            "<div style='font-size: 18px; font-weight: bold; margin-bottom: 5px;'>ClaudeMods Custom Modifications</div>"
            "<div style='font-size: 14px;'>Powered by DeepSeek AI since July 2024</div>"
            "</div>"
        );
        deepseekText->setTextFormat(Qt::RichText);
        layout->addWidget(deepseekText);

        // CCM content
        QScrollArea *scrollArea = new QScrollArea();
        scrollArea->setWidgetResizable(true);
        QWidget *ccmContent = new QWidget();
        QVBoxLayout *ccmLayout = new QVBoxLayout(ccmContent);
        ccmLayout->setSpacing(25);

        // Incus System Containers
        QWidget *incusSection = createCCMSection("Incus System Containers");
        QGridLayout *incusGrid = new QGridLayout();
        incusGrid->addWidget(createToolCard("Google Drive Resources", "https://drive.google.com/drive/folders/1-6eOluk8Zws0PhXDHFea_qMYayjwUopB"), 0, 0);
        ((QWidget*)incusSection->children().last())->setLayout(incusGrid);
        ccmLayout->addWidget(incusSection);

        // Isos To Build From
        QWidget *isosSection = createCCMSection("Isos To Build From 📀");
        QGridLayout *isosGrid = new QGridLayout();
        isosGrid->addWidget(createToolCard("Google Drive ISO Collection", "https://drive.google.com/drive/folders/1rm-s7avP_G9NkhXK0tKkTh1a_UJ6YIYl"), 0, 0);
        ((QWidget*)isosSection->children().last())->setLayout(isosGrid);
        ccmLayout->addWidget(isosSection);

        // Claudemods Distributions
        QWidget *distrosSection = createCCMSection("Claudemods Distributions 📀");
        QGridLayout *distrosGrid = new QGridLayout();
        distrosGrid->addWidget(createToolCard("Custom Distributions", "https://drive.google.com/drive/folders/1PsEbYVgRC8RP8SX7nfJle6CM4OjeK9HJ"), 0, 0);
        ((QWidget*)distrosSection->children().last())->setLayout(distrosGrid);
        ccmLayout->addWidget(distrosSection);

        // Container Tools
        QWidget *containerSection = createCCMSection("Container Tools 📦");
        QGridLayout *containerGrid = new QGridLayout();
        containerGrid->addWidget(createToolCard("ACCU", "https://github.com/claudemods/ACCU", "Advanced Container Creation Utility"), 0, 0);
        ((QWidget*)containerSection->children().last())->setLayout(containerGrid);
        ccmLayout->addWidget(containerSection);

        // ISO Creator Tools
        QWidget *isoSection = createCCMSection("ISO Creator Tools 📀");
        QGridLayout *isoGrid = new QGridLayout();
        isoGrid->addWidget(createToolCard("Arch Incus ISO Creator", "https://github.com/claudemods/Arch-Incus-Iso-Creator-Script", "Script for creating Arch Linux ISOs"), 0, 0);
        isoGrid->addWidget(createToolCard("Apex Arch ISO Creator (GUI)", "https://github.com/claudemods/ApexArchIsoCreatorGuiAppImage", "Graphical Arch ISO creator (AppImage)"), 0, 1);
        isoGrid->addWidget(createToolCard("Apex Arch ISO Creator (Script)", "https://github.com/claudemods/ApexArchIsoCreatorScriptAppImage", "Script version of Arch ISO creator"), 1, 0);
        isoGrid->addWidget(createToolCard("Multi-ISO Konsole Script", "https://github.com/claudemods/claudemods-multi-iso-konsole-script", "Create Debian/Ubuntu ISOs"), 1, 1);
        ((QWidget*)isoSection->children().last())->setLayout(isoGrid);
        ccmLayout->addWidget(isoSection);

        // Cloning Tools
        QWidget *cloningSection = createCCMSection("Cloning Tools 💾");
        QGridLayout *cloningGrid = new QGridLayout();
        cloningGrid->addWidget(createToolCard("Chrome OS Cloner", "https://github.com/claudemods/claudemods-chromeoscloner"), 0, 0);
        cloningGrid->addWidget(createToolCard("Clone Linux System To Archives", "https://github.com/claudemods/CS2A"), 0, 1);
        cloningGrid->addWidget(createToolCard("Plasma 6 Cloner", "https://github.com/claudemods/plasma6cloner"), 1, 0);
        cloningGrid->addWidget(createToolCard("btrfssystemcloner", "https://github.com/claudemods/btrfssystemcloner"), 1, 1);
        ((QWidget*)cloningSection->children().last())->setLayout(cloningGrid);
        ccmLayout->addWidget(cloningSection);

        // Installers
        QWidget *installerSection = createCCMSection("Installers 🛠️");
        QGridLayout *installerGrid = new QGridLayout();
        installerGrid->addWidget(createToolCard("Arch Installer (GUI, ext4)", "https://github.com/claudemods/ApexArchInstallerAppImage"), 0, 0);
        installerGrid->addWidget(createToolCard("Arch Installer (Script, Btrfs)", "https://github.com/claudemods/Apex-InstallerBtrfs"), 0, 1);
        installerGrid->addWidget(createToolCard("Debian Installer (ext4)", "https://github.com/claudemods/claudemods-DebianInstaller"), 1, 0);
        ((QWidget*)installerSection->children().last())->setLayout(installerGrid);
        ccmLayout->addWidget(installerSection);

        // AppImages - Browsers
        QWidget *browserSection = createCCMSection("AppImages 🖥️");
        QLabel *browserLabel = new QLabel("<h3 style='color: white;'>Browsers</h3>");
        browserLabel->setTextFormat(Qt::RichText);
        ccmLayout->addWidget(browserLabel);
        
        QWidget *browserGridWidget = new QWidget();
        QGridLayout *browserGrid = new QGridLayout(browserGridWidget);
        browserGrid->addWidget(createToolCard("Apex Browser", "https://github.com/claudemods/ApexBrowserAppImage"), 0, 0);
        browserGrid->addWidget(createToolCard("Cachy Browser", "https://github.com/claudemods/CachyBrowserAppImage"), 0, 1);
        browserGrid->addWidget(createToolCard("Firefox", "https://github.com/claudemods/FireFoxAppImage"), 1, 0);
        browserGrid->addWidget(createToolCard("Microsoft Edge", "https://github.com/claudemods/MicroSoftEdgeAppImage"), 1, 1);
        browserGrid->addWidget(createToolCard("Brave Browser", "https://github.com/claudemods/BraveBrowserAppImage"), 2, 0);
        browserGrid->addWidget(createToolCard("Chromium", "https://github.com/claudemods/ChromiumAppImage"), 2, 1);
        browserGrid->addWidget(createToolCard("Opera", "https://github.com/claudemods/OperaAppImage"), 3, 0);
        ccmLayout->addWidget(browserGridWidget);

        // AppImages - Multimedia
        QLabel *multimediaLabel = new QLabel("<h3 style='color: white;'>Multimedia</h3>");
        multimediaLabel->setTextFormat(Qt::RichText);
        ccmLayout->addWidget(multimediaLabel);
        
        QWidget *multimediaGridWidget = new QWidget();
        QGridLayout *multimediaGrid = new QGridLayout(multimediaGridWidget);
        multimediaGrid->addWidget(createToolCard("VLC", "https://github.com/claudemods/VlcAppImage"), 0, 0);
        multimediaGrid->addWidget(createToolCard("Kdenlive", "https://www.pling.com/p/2259804"), 0, 1);
        multimediaGrid->addWidget(createToolCard("Shotcut", "https://www.pling.com/p/2259392"), 1, 0);
        multimediaGrid->addWidget(createToolCard("Krita", "https://www.pling.com/p/2259793"), 1, 1);
        multimediaGrid->addWidget(createToolCard("Netflix", "https://www.pling.com/p/2287241"), 2, 0);
        ccmLayout->addWidget(multimediaGridWidget);

        // AppImages - Graphics
        QLabel *graphicsLabel = new QLabel("<h3 style='color: white;'>Graphics</h3>");
        graphicsLabel->setTextFormat(Qt::RichText);
        ccmLayout->addWidget(graphicsLabel);
        
        QWidget *graphicsGridWidget = new QWidget();
        QGridLayout *graphicsGrid = new QGridLayout(graphicsGridWidget);
        graphicsGrid->addWidget(createToolCard("GIMP", "https://github.com/claudemods/GimpAppImage"), 0, 0);
        graphicsGrid->addWidget(createToolCard("Inkscape", "https://github.com/claudemods/InkscapeAppImage"), 0, 1);
        ccmLayout->addWidget(graphicsGridWidget);

        // AppImages - AI Tools
        QLabel *aiLabel = new QLabel("<h3 style='color: white;'>AI Tools</h3>");
        aiLabel->setTextFormat(Qt::RichText);
        ccmLayout->addWidget(aiLabel);
        
        QWidget *aiGridWidget = new QWidget();
        QGridLayout *aiGrid = new QGridLayout(aiGridWidget);
        aiGrid->addWidget(createToolCard("Deepseek", "https://github.com/claudemods/DeepSeekAppImage"), 0, 0);
        aiGrid->addWidget(createToolCard("Qwen AI", "https://github.com/claudemods/QwenAiAppimage"), 0, 1);
        aiGrid->addWidget(createToolCard("Gemini", "https://github.com/claudemods/GeminiAppImage"), 1, 0);
        aiGrid->addWidget(createToolCard("ChatGPT", "https://github.com/claudemods/ChatGptAppImage"), 1, 1);
        ccmLayout->addWidget(aiGridWidget);

        // AppImages - Utilities
        QLabel *utilsLabel = new QLabel("<h3 style='color: white;'>Utilities</h3>");
        utilsLabel->setTextFormat(Qt::RichText);
        ccmLayout->addWidget(utilsLabel);
        
        QWidget *utilsGridWidget = new QWidget();
        QGridLayout *utilsGrid = new QGridLayout(utilsGridWidget);
        utilsGrid->addWidget(createToolCard("Custom Bottle For Gamers", "https://github.com/claudemods/Custom-Bottle-For-Gamers"), 0, 0);
        utilsGrid->addWidget(createToolCard("YouTube Downloader", "https://github.com/claudemods/YoutubeAndDownloader"), 0, 1);
        utilsGrid->addWidget(createToolCard("qBittorrent", "https://www.pling.com/p/2259406"), 1, 0);
        utilsGrid->addWidget(createToolCard("Arch Auto Chroot", "https://github.com/claudemods/AutoArchChrootQt6Appimage"), 1, 1);
        utilsGrid->addWidget(createToolCard("Arch Mirror Changer", "https://github.com/claudemods/ArchMirrorChanger"), 2, 0);
        ccmLayout->addWidget(utilsGridWidget);

        // AppImages - Social
        QLabel *socialLabel = new QLabel("<h3 style='color: white;'>Social</h3>");
        socialLabel->setTextFormat(Qt::RichText);
        ccmLayout->addWidget(socialLabel);
        
        QWidget *socialGridWidget = new QWidget();
        QGridLayout *socialGrid = new QGridLayout(socialGridWidget);
        socialGrid->addWidget(createToolCard("Facebook", "https://www.pling.com/p/2195889"), 0, 0);
        socialGrid->addWidget(createToolCard("Facebook Messenger", "https://www.pling.com/p/2195882"), 0, 1);
        socialGrid->addWidget(createToolCard("Discord", "https://github.com/claudemods/DiscordAppImage"), 1, 0);
        socialGrid->addWidget(createToolCard("WhatsApp", "https://www.pling.com/p/2195838"), 1, 1);
        ccmLayout->addWidget(socialGridWidget);

        // KDE Tools
        QWidget *kdeSection = createCCMSection("KDE Tools 🖱️");
        QGridLayout *kdeGrid = new QGridLayout();
        kdeGrid->addWidget(createToolCard("11menu", "https://github.com/claudemods/11menu", "Custom KDE menu"), 0, 0);
        kdeGrid->addWidget(createToolCard("Dolphin as Root", "https://github.com/claudemods/Dolphin-As-Root-Plasma-5-and-Plasma-6", "Root file manager integration"), 0, 1);
        kdeGrid->addWidget(createToolCard("KDE Store", "https://www.pling.com/p/2195815"), 1, 0);
        ((QWidget*)kdeSection->children().last())->setLayout(kdeGrid);
        ccmLayout->addWidget(kdeSection);

        // Wallpapers
        QWidget *wallpaperSection = createCCMSection("Wallpapers 🖼️");
        QGridLayout *wallpaperGrid = new QGridLayout();
        wallpaperGrid->addWidget(createToolCard("Rift", "https://www.pling.com/p/2284610/"), 0, 0);
        wallpaperGrid->addWidget(createToolCard("Escape", "https://www.pling.com/p/2284618/"), 0, 1);
        wallpaperGrid->addWidget(createToolCard("July", "https://www.pling.com/p/2284615/"), 0, 2);
        wallpaperGrid->addWidget(createToolCard("Today", "https://www.pling.com/p/2284611/"), 1, 0);
        wallpaperGrid->addWidget(createToolCard("Tomorrow", "https://www.pling.com/p/2284612/"), 1, 1);
        wallpaperGrid->addWidget(createToolCard("Yesterday", "https://www.pling.com/p/2284613/"), 1, 2);
        wallpaperGrid->addWidget(createToolCard("June", "https://www.pling.com/p/2284614/"), 2, 0);
        wallpaperGrid->addWidget(createToolCard("Soon", "https://www.pling.com/p/2284616/"), 2, 1);
        wallpaperGrid->addWidget(createToolCard("Wraft", "https://www.pling.com/p/2284617/"), 2, 2);
        wallpaperGrid->addWidget(createToolCard("DayOne", "https://www.pling.com/p/2284620/"), 3, 0);
        ((QWidget*)wallpaperSection->children().last())->setLayout(wallpaperGrid);
        ccmLayout->addWidget(wallpaperSection);

        ccmLayout->addStretch();
        scrollArea->setWidget(ccmContent);
        layout->addWidget(scrollArea);
    }

    void createGuidePage() {
        guidePage = new QWidget();
        QVBoxLayout *layout = new QVBoxLayout(guidePage);
        layout->setContentsMargins(20, 20, 20, 20);
        layout->setSpacing(20);

        // Close button
        QPushButton *closeBtn = new QPushButton("× Close");
        closeBtn->setStyleSheet(
            "QPushButton {"
            "  background-color: #e06c75;"
            "  color: white;"
            "  border: none;"
            "  padding: 5px 10px;"
            "  border-radius: 3px;"
            "  font-weight: bold;"
            "}"
            "QPushButton:hover {"
            "  background-color: #9a0028;"
            "}"
        );
        closeBtn->setFixedSize(80, 30);
        layout->addWidget(closeBtn, 0, Qt::AlignRight);

        // Badges
        QHBoxLayout *badgesLayout = new QHBoxLayout();
        badgesLayout->setSpacing(10);
        badgesLayout->addStretch();
        
        QLabel *archBadge = new QLabel();
        archBadge->setPixmap(QPixmap(":/arch_badge.png")); // You'll need to add this resource
        badgesLayout->addWidget(archBadge);
        
        QLabel *cachyBadge = new QLabel();
        cachyBadge->setPixmap(QPixmap(":/cachy_badge.png")); // You'll need to add this resource
        badgesLayout->addWidget(cachyBadge);
        
        badgesLayout->addStretch();
        layout->addLayout(badgesLayout);

        // DeepSeek logo
        QLabel *deepseekLogo = new QLabel();
        deepseekLogo->setPixmap(QPixmap(":/deepseek_logo.png")); // You'll need to add this resource
        deepseekLogo->setAlignment(Qt::AlignCenter);
        layout->addWidget(deepseekLogo);

        // Guide content
        QScrollArea *scrollArea = new QScrollArea();
        scrollArea->setWidgetResizable(true);
        QWidget *guideContent = new QWidget();
        QVBoxLayout *guideLayout = new QVBoxLayout(guideContent);
        guideLayout->setSpacing(20);

        // Profile section
        QWidget *profileSection = new QWidget();
        QVBoxLayout *profileLayout = new QVBoxLayout(profileSection);
        profileLayout->setAlignment(Qt::AlignCenter);
        
        QLabel *profileImage = new QLabel();
        profileImage->setPixmap(QPixmap(":/profile.webp").scaled(200, 200, Qt::KeepAspectRatio, Qt::SmoothTransformation));
        profileImage->setStyleSheet("border-radius: 100px; border: 3px solid #00FFFF;");
        profileLayout->addWidget(profileImage, 0, Qt::AlignCenter);
        
        QLabel *guideTitle = new QLabel("Guide To Linux");
        guideTitle->setStyleSheet("color: white; font-size: 24px; font-weight: bold;");
        guideTitle->setAlignment(Qt::AlignCenter);
        profileLayout->addWidget(guideTitle);
        guideLayout->addWidget(profileSection);

        // History section
        QLabel *historyLabel = new QLabel(
            "<pre style='color: #00FFFF;'>"
            "History of Myself: Aaron Douglas D'souza\n\n"
            "I am 28 years old, originally from London in the UK, though I now live in Manchester.\n\n"
            "I hate the words \"Noob\" or \"Newbie,\" but I was once a new Linux user. I started using Nobara around September 2023.\n"
            "From there, I began creating a custom taskbar, which can be seen in the project link below:\n"
            "Though the original color was burgundy and it was called \"SpitFire.\"\n\n"
            "Project Link: <a href='https://github.com/claudemods/ApexKLGE-Minimal' style='color: #00FFFF; text-decoration: none;'>ApexKLGE-Minimal</a>\n\n"
            "More photos of my old projects can be found here:\n"
            "<a href='https://www.claudemods.co.uk/distributions/theme-photos' style='color: #00FFFF; text-decoration: none;'>Theme Photos</a>\n\n"
            "I was originally an advanced Windows user who enjoyed testing betas and development builds.\n"
            "In fact, I tested Windows 8/8.1/10/11 before their official releases and was testing KDE Plasma 6 before it came out.\n\n"
            "I have also tested games like \"Skull and Bones\" by Ubisoft before their release. I like to get involved.\n\n"
            "Since I am a game mod creator, music creator, and now a software engineer,\n"
            "I have a lot of free time on my hands after putting my game mod updates on hold.\n\n"
            "I've made tons of scripts and applications for Linux, and I wish to help others with what I've learned.\n\n"
            "Below, you'll find many useful tutorials for Linux,\n"
            "including application building and complex Bash commands that everyday users might not know.\n\n"
            "More to come I will update this soon!"
            "</pre>"
        );
        historyLabel->setTextFormat(Qt::RichText);
        historyLabel->setOpenExternalLinks(true);
        guideLayout->addWidget(historyLabel);

        // Video section
        QLabel *videoLabel = new QLabel("<h1 style='color: white; text-align: center;'>First, Watch This Video from Chris Titus Tech</h1>");
        videoLabel->setTextFormat(Qt::RichText);
        guideLayout->addWidget(videoLabel);
        
        QLabel *videoDesc = new QLabel(
            "<p style='color: #00FFFF; text-align: center;'>"
            "He shares many useful tips in this video:<br>"
            "<a href='https://youtu.be/u0CIrKkBung?si=X7u6aIUhP7jTYLAA' style='color: #00FFFF; text-decoration: none;'>Chris Titus Tech's Video</a><br>"
            "Please support him if you can!"
            "</p>"
        );
        videoDesc->setTextFormat(Qt::RichText);
        videoDesc->setOpenExternalLinks(true);
        guideLayout->addWidget(videoDesc);

        // System Commands section
        QLabel *systemCommandsLabel = new QLabel(
            "<pre style='color: #00FFFF;'>"
            "<h1 style='color: white;'>System Commands For Updating</h1>\n\n"
            "<div style='background-color: rgba(255, 243, 212, 0.2); padding: 10px; border-left: 4px solid #f0ad4e; margin: 15px 0; color: #00FFFF;'>"
            "Please remove the quotes \"\" from commands - they are hypothetical"
            "</div>\n\n"
            "<h2 style='color: white;'>Arch Updating</h2>\n\n"
            "Update Package List\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo pacman -Sy</span>\n\n"
            "Update All Installed Packages\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo pacman -Syu</span>\n\n"
            "Reboot Your System before next steps\n\n"
            "Clean Old Packages\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo pacman -Scc</span>\n\n\n"
            "<h2 style='color: white;'>Ubuntu/Debian Updating</h2>\n\n"
            "Update Package List\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo apt update</span>\n\n"
            "Update All Installed Packages\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo apt full-upgrade</span>\n\n"
            "Reboot Your System Before Next Steps\n\n"
            "Clean Old Packages\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo apt-get clean</span>\n\n"
            "Auto Remove Unused Packages\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo apt autoremove</span>"
            "</pre>"
        );
        systemCommandsLabel->setTextFormat(Qt::RichText);
        guideLayout->addWidget(systemCommandsLabel);

        // Password section
        QLabel *passwordLabel = new QLabel(
            "<pre style='color: #00FFFF;'>"
            "<h1 style='color: white;'>Changing Passwords, Usernames, Home Folder, Adding to Group</h1>\n\n"
            "To Change Your Password\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo passwd username</span>\n"
            "Example: <span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo passwd root</span>\n\n"
            "Change Username and Home Folder\n"
            "Log in to the root account.\n"
            "Change Username:\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo usermod -l newusername oldusername</span>\n"
            "Example: <span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo usermod -l apex manowar</span>\n\n"
            "Change Home Folder:\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo usermod -d /home/yournewusername -m yournewusername</span>\n"
            "Example: <span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo usermod -d /home/apex -m apex</span>\n\n"
            "Add User to Group:\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo usermod -aG groupname username</span>\n"
            "Example: <span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo usermod -aG arch apex</span>"
            "</pre>"
        );
        passwordLabel->setTextFormat(Qt::RichText);
        guideLayout->addWidget(passwordLabel);

        // WiFi section
        QLabel *wifiLabel = new QLabel(
            "<pre style='color: #00FFFF;'>"
            "<h1 style='color: white;'>Setup Wi-Fi in Konsole</h1>\n\n"
            "To Get a Wi-Fi List:\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>nmcli d wifi</span>\n\n"
            "To Connect to Wi-Fi:\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>nmcli d wifi connect BSSID password yourpassword</span>\n"
            "Example (fake credentials):\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>nmcli d wifi connect 2E:FB:FA:B9:82:94 password tttodayjunior</span>"
            "</pre>"
        );
        wifiLabel->setTextFormat(Qt::RichText);
        guideLayout->addWidget(wifiLabel);

        // Complex commands section
        QLabel *complexLabel = new QLabel(
            "<pre style='color: #00FFFF;'>"
            "<h1 style='color: white;'>Complex Linux Commands, For Arch, Ubuntu, Debian</h1>\n"
            "Install your drivers for your PC\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo apt install ubuntu-drivers-common</span>\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo ubuntu-drivers autoinstall</span>"
            "</pre>"
        );
        complexLabel->setTextFormat(Qt::RichText);
        guideLayout->addWidget(complexLabel);

        // Compile section
        QLabel *compileLabel = new QLabel(
            "<pre style='color: #00FFFF;'>"
            "<h1 style='color: white;'>Guide For Arch, Ubuntu, Debian To Compile C++ Applications</h1>\n\n"
            "<h2 style='color: white;'>Arch Needed Packages To Compile Qt6 Applications</h2>\n\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo -S base-devel qt6-base qt6-tools</span>\n\n"
            "Files Need To Compile C++\n"
            "main.cpp main.pro\n\n"
            "Other Things That Can Be Used\n"
            ".h files to add different functions within the project \n"
            "resources.qrc to embed other files\n\n"
            "<h2 style='color: white;'>Ubuntu/Debian Packages To Compile Qt6 Applications</h2>\n\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo apt install build-essential qt6-base-dev</span>"
            "</pre>"
        );
        compileLabel->setTextFormat(Qt::RichText);
        guideLayout->addWidget(compileLabel);

        // Example files section
        QLabel *exampleLabel = new QLabel("<h1 style='color: white; text-align: center;'>Example Files For .cpp .pro And resources.qrc</h1>");
        exampleLabel->setTextFormat(Qt::RichText);
        guideLayout->addWidget(exampleLabel);
        
        QLabel *exampleLinks = new QLabel(
            "<div style='text-align: center;'>"
            "<a href='https://github.com/claudemods/Guide-To-Linux/blob/main/example.cpp' style='color: #00FFFF; text-decoration: none;'>Example main.cpp</a><br>"
            "<a href='https://github.com/claudemods/Guide-To-Linux/blob/main/example.h' style='color: #00FFFF; text-decoration: none;'>Example backend.h</a><br>"
            "<a href='https://github.com/claudemods/Guide-To-Linux/blob/main/example.pro' style='color: #00FFFF; text-decoration: none;'>Example main.pro</a><br>"
            "<a href='https://github.com/claudemods/Guide-To-Linux/blob/main/example.qrc' style='color: #00FFFF; text-decoration: none;'>Example resources.qrc</a>"
            "</div>"
        );
        exampleLinks->setTextFormat(Qt::RichText);
        exampleLinks->setOpenExternalLinks(true);
        guideLayout->addWidget(exampleLinks);

        // Tools section
        QLabel *toolsLabel = new QLabel(
            "<pre style='color: #00FFFF;'>"
            "<h1 style='color: white;'>Everyday Use Tools for Arch, Ubuntu, Debian</h1>\n\n"
            "Edit Text in Konsole\n"
            "Install nano from your repos:\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo pacman -S nano</span> (Arch)\n"
            "<span style='background-color: #2d2d2d; color: #f8f8f2; padding: 2px 5px; border-radius: 3px; font-family: monospace;'>sudo apt install nano</span> (Ubuntu/Debian)\n\n"
            "Custom Application Manager\n"
            "<a href='https://github.com/vinifmor/bauh' style='color: #00FFFF; text-decoration: none;'>bauh</a>\n\n"
            "Custom DNS Manager\n"
            "<a href='https://github.com/DnsChanger/dnsChanger-desktop' style='color: #00FFFF; text-decoration: none;'>dnsChanger-desktop</a>\n\n"
            "Application Store Website\n"
            "<a href='https://www.pling.com' style='color: #00FFFF; text-decoration: none;'>www.pling.com</a>\n\n"
            "KSystemlog\n"
            "<a href='https://apps.kde.org/en-gb/ksystemlog/' style='color: #00FFFF; text-decoration: none;'>KSystemlog</a>\n\n"
            "scrcpy\n"
            "<a href='https://github.com/Genymobile/scrcpy' style='color: #00FFFF; text-decoration: none;'>scrcpy</a>\n\n"
            "spectacle\n"
            "<a href='https://apps.kde.org/en-gb/spectacle/' style='color: #00FFFF; text-decoration: none;'>spectacle</a>\n\n"
            "ark\n"
            "<a href='https://apps.kde.org/en-gb/ark/' style='color: #00FFFF; text-decoration: none;'>ark</a>\n\n"
            "file manager\n"
            "<a href='https://apps.kde.org/en-gb/dolphin/' style='color: #00FFFF; text-decoration: none;'>dolphin</a>\n\n"
            "dolphin service menus for arch\n"
            "<a href='https://www.pling.com/p/2160116' style='color: #00FFFF; text-decoration: none;'>Dolphin Service Menus</a>\n\n"
            "custom windows menu\n"
            "<a href='https://github.com/claudemods/11menu' style='color: #00FFFF; text-decoration: none;'>11menu</a>\n\n"
            "hide files in dolphin\n"
            "<a href='https://github.com/claudemods/hideitems' style='color: #00FFFF; text-decoration: none;'>hideitems</a>\n\n"
            "open dolphin as root \n"
            "<a href='https://github.com/claudemods/Dolphin-As-Root-Plasma-5-and-Plasma-6' style='color: #00FFFF; text-decoration: none;'>Dolphin As Root</a>\n\n"
            "stacer \n"
            "<a href='https://appimage.github.io/Stacer/' style='color: #00FFFF; text-decoration: none;'>Stacer</a>\n\n"
            "create arch isos with script\n"
            "<a href='https://www.pling.com/p/2261487' style='color: #00FFFF; text-decoration: none;'>Arch ISO Script</a>\n\n"
            "create arch isos with gui application\n"
            "<a href='https://flatpak.opendesktop.org/p/2262634' style='color: #00FFFF; text-decoration: none;'>Arch ISO GUI</a>\n\n"
            "Create Docker Containers From Cloned Linux Systems\n"
            "<a href='https://github.com/claudemods/ACCU' style='color: #00FFFF; text-decoration: none;'>ACCU</a>\n\n"
            "view and edit html\n"
            "<a href='https://github.com/claudemods/apex-htmlviewer' style='color: #00FFFF; text-decoration: none;'>apex-htmlviewer</a>\n\n"
            "custom decentralized browser\n"
            "<a href='https://github.com/claudemods/ApexBrowserAppImage' style='color: #00FFFF; text-decoration: none;'>ApexBrowser</a>\n\n"
            "setup bottles for games\n"
            "<a href='https://github.com/claudemods/Custom-Bottle-For-Gamers' style='color: #00FFFF; text-decoration: none;'>Custom Bottle For Gamers</a>\n\n"
            "custom arch installer gui\n"
            "<a href='https://github.com/claudemods/ApexArchInstallerAppImage' style='color: #00FFFF; text-decoration: none;'>ApexArchInstaller</a>\n\n"
            "custom arch btrfs installer script\n"
            "<a href='https://github.com/claudemods/Apex-InstallerBtrfs' style='color: #00FFFF; text-decoration: none;'>Apex-InstallerBtrfs</a>\n\n"
            "create arch bootable usb\n"
            "<a href='https://github.com/claudemods/ApexBootableUsbAppimage' style='color: #00FFFF; text-decoration: none;'>ApexBootableUsb</a>"
            "</pre>"
        );
        toolsLabel->setTextFormat(Qt::RichText);
        toolsLabel->setOpenExternalLinks(true);
        guideLayout->addWidget(toolsLabel);

        guideLayout->addStretch();
        scrollArea->setWidget(guideContent);
        layout->addWidget(scrollArea);
    }

    void setupConnections() {
        // Connect main page buttons
        QList<QPushButton*> buttons = mainPage->findChildren<QPushButton*>();
        for (QPushButton *btn : buttons) {
            if (btn->text() == "Distributions") {
                connect(btn, &QPushButton::clicked, this, [this]() {
                    showPage(galleryPage);
                });
            } else if (btn->text() == "Guide to Linux") {
                connect(btn, &QPushButton::clicked, this, [this]() {
                    showPage(guidePage);
                });
            } else if (btn->text() == "ClaudeModsCCM") {
                connect(btn, &QPushButton::clicked, this, [this]() {
                    showPage(ccmPage);
                });
            } else if (btn->text() == "Support My Work") {
                connect(btn, &QPushButton::clicked, this, []() {
                    QDesktopServices::openUrl(QUrl("https://www.paypal.com/paypalme/claudemods?country.x=GB&locale.x=en_GB"));
                });
            } else if (btn->text() == "V1 Repo") {
                connect(btn, &QPushButton::clicked, this, [this]() {
                    v1RepoOptions->setVisible(!v1RepoOptions->isVisible());
                    v2RepoOptions->hide();
                });
            } else if (btn->text() == "V2 Repo") {
                connect(btn, &QPushButton::clicked, this, [this]() {
                    v2RepoOptions->setVisible(!v2RepoOptions->isVisible());
                    v1RepoOptions->hide();
                });
            } else if (btn->text() == "Copy V1 Repo Config") {
                connect(btn, &QPushButton::clicked, this, [this]() {
                    QString configText = 
                        "[claudemods-v1-kernels-tested]\n"
                        "SigLevel = Never\n"
                        "Server = https://claudemodsreloaded.com/v1-kernels-tested\n\n"
                        "[claudemods-v1-core]\n"
                        "SigLevel = Never\n"
                        "Server = https://github.com/claudemods/claudemods-v1/releases/download/v1-core/\n\n"
                        "[claudemods-v1-base]\n"
                        "SigLevel = Never\n"
                        "Server = https://claudemodsreloaded.com/v1-base-final/";
                    
                    QApplication::clipboard()->setText(configText);
                    showCopyNotification();
                });
            } else if (btn->text() == "Copy V2 Repo Config") {
                connect(btn, &QPushButton::clicked, this, [this]() {
                    QString configText = 
                        "[claudemods-v2-kernels-rolling] 🚀\n"
                        "SigLevel = Never\n"
                        "Server = https://claudemodsreloaded.com/v2-kernels-rolling/  \n\n"
                        "[claudemods-v2-base] 🚀\n"
                        "SigLevel = Never\n"
                        "Server = https://claudemodsreloaded.com/v2-base/  \n\n"
                        "[claudemods-v2-core] 🚀\n"
                        "SigLevel = Never\n"
                        "Server = https://claudemodsreloaded.com/v2-core/  \n\n"
                        "[claudemods-v2-desktop] 🚀\n"
                        "SigLevel = Never\n"
                        "Server = https://claudemodsreloaded.com/v2-desktop/";
                    
                    QApplication::clipboard()->setText(configText);
                    showCopyNotification();
                });
            }
        }

        // Connect gallery page close button
        QPushButton *closeGalleryBtn = galleryPage->findChild<QPushButton*>();
        connect(closeGalleryBtn, &QPushButton::clicked, this, [this]() {
            showPage(mainPage);
        });

        // Connect CCM page close button
        QPushButton *closeCCMBtn = ccmPage->findChild<QPushButton*>();
        connect(closeCCMBtn, &QPushButton::clicked, this, [this]() {
            showPage(mainPage);
        });

        // Connect guide page close button
        QPushButton *closeGuideBtn = guidePage->findChild<QPushButton*>();
        connect(closeGuideBtn, &QPushButton::clicked, this, [this]() {
            showPage(mainPage);
        });

        // Connect back button
        connect(backButton, &QPushButton::clicked, this, [this]() {
            showPage(mainPage);
        });
    }

    void showPage(QWidget *page) {
        if (page == mainPage) {
            backButton->hide();
            stackedWidget->setCurrentWidget(mainPage);
        } else {
            backButton->show();
            stackedWidget->setCurrentWidget(page);
        }
    }

    void showCopyNotification() {
        copyNotification->show();
        QTimer::singleShot(2000, this, [this]() {
            copyNotification->hide();
        });
    }

    QPushButton* createButton(const QString &text) {
        QPushButton *btn = new QPushButton(text);
        btn->setStyleSheet(
            "QPushButton {"
            "  padding: 6px 12px;"
            "  border-radius: 3px;"
            "  font-weight: 600;"
            "  background-color: #dfc43d;"
            "  color: #00568f;"
            "  transition: all 0.15s ease;"
            "  font-size: 12px;"
            "  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"
            "  height: 30px;"
            "}"
            "QPushButton:hover {"
            "  transform: translateY(-1px);"
            "  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);"
            "}"
        );
        btn->setFixedHeight(30);
        return btn;
    }

    QPushButton* createRepoButton(const QString &text) {
        QPushButton *btn = new QPushButton(text);
        btn->setStyleSheet(
            "QPushButton {"
            "  background-color: #800020;"
            "  color: white;"
            "  border: none;"
            "  padding: 6px 12px;"
            "  border-radius: 3px;"
            "  font-weight: 600;"
            "  font-size: 12px;"
            "  height: 30px;"
            "}"
            "QPushButton:hover {"
            "  background-color: #9a0028;"
            "  transform: translateY(-1px);"
            "}"
        );
        btn->setFixedHeight(30);
        return btn;
    }

    QPushButton* createBadge(const QString &text, const QString &color) {
        QPushButton *btn = new QPushButton(text);
        QString bgColor;
        QString textColor = "white";
        
        if (color == "red") bgColor = "#e06c75";
        else if (color == "teal") bgColor = "#56b6c2";
        else if (color == "gold") {
            bgColor = "#FFD700";
            textColor = "#000";
        }
        else if (color == "highlight") {
            bgColor = "#00FFFF";
            textColor = "#000";
        }
        
        btn->setStyleSheet(
            "QPushButton {"
            "  padding: 5px 8px;"
            "  border-radius: 10px;"
            "  font-weight: 600;"
            "  font-size: 11px;"
            "  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"
            "  height: 30px;"
            "  background-color: " + bgColor + ";"
            "  color: " + textColor + ";"
            "}"
        );
        btn->setFixedHeight(30);
        
        // Connect to open appropriate URL
        if (text == "Gta Mods") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://www.gtainside.com/user/mapmods100"));
            });
        } else if (text == "OS Linux") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://www.linux.org"));
            });
        } else if (text == "DISTRO Arch") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://archlinux.org"));
            });
        } else if (text == "DISTRO CachyOS") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://cachyos.org/"));
            });
        } else if (text == "claudemods v3.0") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://www.claudemodsreloaded.com"));
            });
        } else if (text == "gta inside v1.5") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://www.gtainside.com/user/mapmods100"));
            });
        } else if (text == "Google Drive v2.0") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://drive.google.com/drive/folders/1MH0CHGvwdDzGSXpjgfBqvfty_asq6cqf"));
            });
        } else if (text == "Sourceforge v2.0") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://sourceforge.net/projects/claudemods/"));
            });
        } else if (text == "Github v2.2") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://github.com/claudemods"));
            });
        } else if (text == "Pling v2.0") {
            connect(btn, &QPushButton::clicked, this, []() {
                QDesktopServices::openUrl(QUrl("https://www.pling.com/u/claudemods/"));
            });
        }
        
        return btn;
    }

    QPushButton* createRepoOption(const QString &text) {
        QPushButton *btn = new QPushButton(text);
        btn->setStyleSheet(
            "QPushButton {"
            "  display: block;"
            "  padding: 5px 8px;"
            "  margin: 3px 0;"
            "  background-color: rgba(255, 255, 255, 0.1);"
            "  border-radius: 2px;"
            "  color: white;"
            "  font-size: 11px;"
            "  text-align: left;"
            "  border: none;"
            "}"
            "QPushButton:hover {"
            "  background-color: rgba(255, 255, 255, 0.2);"
            "}"
        );
        
        // Connect to open appropriate URL
        QString baseUrl = "https://www.claudemodsreloaded.com/" + text;
        connect(btn, &QPushButton::clicked, this, [baseUrl]() {
            QDesktopServices::openUrl(QUrl(baseUrl));
        });
        
        return btn;
    }

    QLabel* createGalleryImage(const QString &imagePath) {
        QLabel *imageLabel = new QLabel();
        imageLabel->setPixmap(QPixmap(imagePath).scaledToWidth(400, Qt::SmoothTransformation));
        imageLabel->setStyleSheet(
            "QLabel {"
            "  margin-bottom: 15px;"
            "  background: rgba(0, 0, 0, 0.7);"
            "  padding: 10px;"
            "  border-radius: 5px;"
            "  border: 2px solid #00FFFF;"
            "}"
            "QLabel:hover {"
            "  transform: scale(1.03);"
            "}"
        );
        imageLabel->setAlignment(Qt::AlignCenter);
        return imageLabel;
    }

    QWidget* createCCMSection(const QString &title) {
        QWidget *section = new QWidget();
        QVBoxLayout *sectionLayout = new QVBoxLayout(section);
        sectionLayout->setContentsMargins(20, 20, 20, 20);
        sectionLayout->setSpacing(15);
        
        QLabel *titleLabel = new QLabel("<h2 style='color: white; text-align: center;'>" + title + "</h2>");
        titleLabel->setTextFormat(Qt::RichText);
        sectionLayout->addWidget(titleLabel);
        
        QWidget *contentWidget = new QWidget();
        sectionLayout->addWidget(contentWidget);
        
        section->setStyleSheet(
            "QWidget {"
            "  background-color: rgba(0, 0, 0, 0.2);"
            "  border-radius: 8px;"
            "  border: 1px solid #00FFFF;"
            "}"
        );
        
        return section;
    }

    QWidget* createToolCard(const QString &title, const QString &url, const QString &description = "") {
        QWidget *card = new QWidget();
        QVBoxLayout *cardLayout = new QVBoxLayout(card);
        cardLayout->setContentsMargins(15, 15, 15, 15);
        cardLayout->setSpacing(5);
        
        QLabel *titleLabel = new QLabel("<a href='" + url + "' style='color: white; text-decoration: none;'>" + title + "</a>");
        titleLabel->setTextFormat(Qt::RichText);
        titleLabel->setOpenExternalLinks(true);
        cardLayout->addWidget(titleLabel);
        
        if (!description.isEmpty()) {
            QLabel *descLabel = new QLabel(description);
            descLabel->setStyleSheet("color: #AAAAAA; font-size: 12px;");
            cardLayout->addWidget(descLabel);
        }
        
        card->setStyleSheet(
            "QWidget {"
            "  background-color: rgba(0, 0, 0, 0.3);"
            "  border-left: 4px solid #00FFFF;"
            "  border-radius: 4px;"
            "}"
            "QWidget:hover {"
            "  transform: translateY(-3px);"
            "}"
        );
        
        return card;
    }

    void loadStylesheet() {
        QString style = 
            "QMainWindow {"
            "  background: qlineargradient(x1:0, y1:0, x2:1, y2:1, stop:0 #00568f, stop:1 #003366);"
            "}"
            
            "QScrollArea {"
            "  border: none;"
            "  background: transparent;"
            "}"
            
            "QScrollBar:vertical {"
            "  border: none;"
            "  background: rgba(0, 0, 0, 0.2);"
            "  width: 10px;"
            "  margin: 0px 0px 0px 0px;"
            "}"
            
            "QScrollBar::handle:vertical {"
            "  background: #00FFFF;"
            "  min-height: 20px;"
            "  border-radius: 5px;"
            "}"
            
            "QScrollBar::add-line:vertical, QScrollBar::sub-line:vertical {"
            "  border: none;"
            "  background: none;"
            "  height: 0px;"
            "}"
            
            "QScrollBar::add-page:vertical, QScrollBar::sub-page:vertical {"
            "  background: none;"
            "}";
        
        setStyleSheet(style);
    }

    QWidget *v1RepoOptions;
    QWidget *v2RepoOptions;
    QLabel *copyNotification;
};

int main(int argc, char *argv[]) {
    QApplication app(argc, argv);
    
    // Set application attributes
    app.setApplicationName("ClaudeMods Reloaded");
    app.setApplicationDisplayName("ClaudeMods Reloaded");
    app.setWindowIcon(QIcon(":/icon.png")); // You'll need to add this resource
    
    MainWindow window;
    window.show();
    
    return app.exec();
}

#include "main.moc"
