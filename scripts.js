const translations = {
    en: {
        loginTitle: 'Login',
        loginEmailLabel: 'Email:',
        loginPasswordLabel: 'Password:',
        loginButton: 'Login',
        registerTitle: 'Register',
        registerEmailLabel: 'Email:',
        registerPasswordLabel: 'Password:',
        registerButton: 'Register',
        profileTitle: 'Create Profile',
        nameLabel: 'Name:',
        ageLabel: 'Age:',
        genderLabel: 'Gender:',
        hairColorLabel: 'Hair Color:',
        hairTextureLabel: 'Hair Texture:',
        straighteningLabel: 'Straightening:',
        straighteningYesLabel: 'Yes',
        straighteningNoLabel: 'No',
        colorLabel: 'Color:',
        colorYesLabel: 'Yes',
        colorNoLabel: 'No',
        blackDyeLabel: 'Black Dye:',
        blackDyeYesLabel: 'Yes',
        blackDyeNoLabel: 'No',
        hairstyleLabel: 'Current Hairstyle:',
        saveProfileButton: 'Save'
    },
    ja: {
        loginTitle: 'ログイン',
        loginEmailLabel: 'メールアドレス:',
        loginPasswordLabel: 'パスワード:',
        loginButton: 'ログイン',
        registerTitle: '登録',
        registerEmailLabel: 'メールアドレス:',
        registerPasswordLabel: 'パスワード:',
        registerButton: '登録',
        profileTitle: 'プロフィール作成',
        nameLabel: '名前:',
        ageLabel: '年齢:',
        genderLabel: '性別:',
        hairColorLabel: '髪色:',
        hairTextureLabel: '髪質:',
        straighteningLabel: '縮毛矯正:',
        straighteningYesLabel: '有',
        straighteningNoLabel: '無',
        colorLabel: 'カラー:',
        colorYesLabel: '有',
        colorNoLabel: '無',
        blackDyeLabel: '黒染め:',
        blackDyeYesLabel: '有',
        blackDyeNoLabel: '無',
        hairstyleLabel: '現在の髪型:',
        saveProfileButton: '保存'
    }
};

function setLanguage(language) {
    // ログインと登録ページの翻訳
    const loginTitle = document.getElementById('loginTitle');
    if (loginTitle) loginTitle.textContent = translations[language].loginTitle;

    const loginEmailLabel = document.getElementById('loginEmailLabel');
    if (loginEmailLabel) loginEmailLabel.textContent = translations[language].loginEmailLabel;

    const loginPasswordLabel = document.getElementById('loginPasswordLabel');
    if (loginPasswordLabel) loginPasswordLabel.textContent = translations[language].loginPasswordLabel;

    const loginButton = document.getElementById('loginButton');
    if (loginButton) loginButton.textContent = translations[language].loginButton;

    const registerTitle = document.getElementById('registerTitle');
    if (registerTitle) registerTitle.textContent = translations[language].registerTitle;

    const registerEmailLabel = document.getElementById('registerEmailLabel');
    if (registerEmailLabel) registerEmailLabel.textContent = translations[language].registerEmailLabel;

    const registerPasswordLabel = document.getElementById('registerPasswordLabel');
    if (registerPasswordLabel) registerPasswordLabel.textContent = translations[language].registerPasswordLabel;

    const registerButton = document.getElementById('registerButton');
    if (registerButton) registerButton.textContent = translations[language].registerButton;

    // プロフィールページの翻訳
    const profileTitle = document.getElementById('profileTitle');
    if (profileTitle) profileTitle.textContent = translations[language].profileTitle;

    const nameLabel = document.getElementById('nameLabel');
    if (nameLabel) nameLabel.textContent = translations[language].nameLabel;

    const ageLabel = document.getElementById('ageLabel');
    if (ageLabel) ageLabel.textContent = translations[language].ageLabel;

    const genderLabel = document.getElementById('genderLabel');
    if (genderLabel) genderLabel.textContent = translations[language].genderLabel;

    const hairColorLabel = document.getElementById('hairColorLabel');
    if (hairColorLabel) hairColorLabel.textContent = translations[language].hairColorLabel;

    const hairTextureLabel = document.getElementById('hairTextureLabel');
    if (hairTextureLabel) hairTextureLabel.textContent = translations[language].hairTextureLabel;

    const straighteningLabel = document.getElementById('straighteningLabel');
    if (straighteningLabel) straighteningLabel.textContent = translations[language].straighteningLabel;

    const straighteningYesLabel = document.getElementById('straighteningYesLabel');
    if (straighteningYesLabel) straighteningYesLabel.textContent = translations[language].straighteningYesLabel;

    const straighteningNoLabel = document.getElementById('straighteningNoLabel');
    if (straighteningNoLabel) straighteningNoLabel.textContent = translations[language].straighteningNoLabel;

    const colorLabel = document.getElementById('colorLabel');
    if (colorLabel) colorLabel.textContent = translations[language].colorLabel;

    const colorYesLabel = document.getElementById('colorYesLabel');
    if (colorYesLabel) colorYesLabel.textContent = translations[language].colorYesLabel;

    const colorNoLabel = document.getElementById('colorNoLabel');
    if (colorNoLabel) colorNoLabel.textContent = translations[language].colorNoLabel;

    const blackDyeLabel = document.getElementById('blackDyeLabel');
    if (blackDyeLabel) blackDyeLabel.textContent = translations[language].blackDyeLabel;

    const blackDyeYesLabel = document.getElementById('blackDyeYesLabel');
    if (blackDyeYesLabel) blackDyeYesLabel.textContent = translations[language].blackDyeYesLabel;

    const blackDyeNoLabel = document.getElementById('blackDyeNoLabel');
    if (blackDyeNoLabel) blackDyeNoLabel.textContent = translations[language].blackDyeNoLabel;

    const hairstyleLabel = document.getElementById('hairstyleLabel');
    if (hairstyleLabel) hairstyleLabel.textContent = translations[language].hairstyleLabel;

    const saveProfileButton = document.getElementById('saveProfileButton');
    if (saveProfileButton) saveProfileButton.textContent = translations[language].saveProfileButton;
}

function toggleDate(dateInputId, show) {
    const dateInput = document.getElementById(dateInputId);
    if (dateInput) dateInput.style.display = show ? 'block' : 'none';
}

// 初期言語設定
setLanguage('ja');
