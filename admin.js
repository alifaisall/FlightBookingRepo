document.getElementById('user').addEventListener('click',user)
document.getElementById('flight').addEventListener('click',flight)

document.getElementById('user').style.backgroundColor = 'black'

function user(){
    document.getElementById('showUser').style.display = 'flex'
    document.getElementById('showFlight').style.display = 'none'
    document.getElementById('user').style.backgroundColor = 'black'
    document.getElementById('flight').style.backgroundColor = '#0505057e'
    document.getElementById('usertbl').style.display = 'flex'
    document.getElementById('flighttbl').style.display = 'none'
    document.getElementById('usersearch').style.display = 'initial'
    document.getElementById('flightsearch').style.display = 'none'
}

function flight(){
    document.getElementById('showFlight').style.display = 'flex'
    document.getElementById('showUser').style.display = 'none'
    document.getElementById('flight').style.backgroundColor = 'black'
    document.getElementById('user').style.backgroundColor = '#0505057e'
    document.getElementById('usertbl').style.display = 'none'
    document.getElementById('flighttbl').style.display = 'flex'
    document.getElementById('usersearch').style.display = 'none'
    document.getElementById('flightsearch').style.display = 'initial'

}

