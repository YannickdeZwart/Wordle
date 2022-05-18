const letters = document.getElementsByClassName('letters');

const body = document.getElementById('body');


body.addEventListener('keydown', function () {
    if (document.activeElement !== document.getElementById('letter' + move)) {
        document.getElementById('letter' + move).focus();
    }
});

let move = 1;

function isCharacterALetter(char) {
    return (/[a-zA-Z]/).test(char)
}

function backSpace(e) {
    if (move === 1) {
        e.preventDefault();
        document.getElementById('letter' + move).value = null;
        document.getElementById('letter' + move).focus();
    } else if (move >= 1){
        e.preventDefault();
        document.getElementById('letter' + move).value = null;
        move--;
        document.getElementById('letter' + move).focus();
    } else {
        move++;
    }
}

function moveCursor()
{
    move++;
    if (move <= 5)
    {
        document.getElementById('letter' + move).focus();
    } else {
        move--;
    }
}

for (let i=0;i<letters.length;i++)
{
    letters[i].addEventListener('keydown', function (e) {
        const key = e.key;
        const move5 = document.getElementById('letter5').value;
        if (key === 'Backspace') {
            backSpace(e);
        } else if (key === 'Enter' && move === 5 && move5 != '') {
            document.getElementById('main-form').submit()
        } else {
            document.getElementById('letter' + move).focus();
        }
    });
    letters[i].addEventListener('input', function (e) {
        if (e.target.id === 'letter' + move) {
            if (!isCharacterALetter(e.target.value)) {
                e.target.value = null;
            } else {
                moveCursor();
            }
        } else {
            e.target.value = null;
            document.getElementById('letter' + move).focus();
        }
    });
}

