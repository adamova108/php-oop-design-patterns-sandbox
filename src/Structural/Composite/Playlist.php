<?php

namespace KWD_Sandbox\Structural\Composite;

class Playlist implements MusicInterface
{

    protected $songs = [];
    protected $currentTrack = 0;

    public function addSong(MusicInterface $song)
    {
        $this->songs[] = $song;
        return true;
    }

    public function play()
    {
        return $this->songs[$this->currentTrack]->play();
    }

    public function next()
    {

        if (isset($this->songs[$this->currentTrack + 1])) {
            $this->currentTrack++;
        }

        return $this->play();
    }

    public function previous()
    {

        if (isset($this->songs[$this->currentTrack - 1])) {
            $this->currentTrack--;
        }

        return $this->play();
    }

}