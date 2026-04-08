<template>
  <div>
    <div class="controls">
      <span id="play" class="button icon-play" @click="playPause"></span>
      <span id="stop" class="button icon-stop" @click="stop"></span>
      <span id="metronome" class="button icon-metronome" :class="{ checked: metronomeEnabled }" @click="toggleMetronome"></span>
      Speed:
      <span class="dropdown">
        <select id="playbackSpeedSelector" class="select" v-model="playbackSpeed" @change="changeSpeed">
          <option value="0.25">25%</option>
          <option value="0.5">50%</option>
          <option value="0.75">75%</option>
          <option value="1">100%</option>
          <option value="1.25">125%</option>
          <option value="1.5">150%</option>
          <option value="2">200%</option>
        </select>
      </span>
      Track:
      <span class="dropdown">
        <span id="tracks" class="select">&nbsp;</span>
        <ul id="trackList" class="itemList dropdown-content">
          <li v-for="track in tracks" :key="track.index" class="item" :data-track="track.index">
            <span class="indicator" @click="selectTrack(track.index)"></span>
            <span class="track-panel">
              <div class="title">{{ track.name }}</div>
              <input :value="track.volume" type="range" min="0" max="16" step="1" @change="changeVolume(track.index, $event)">
              <button type="button" class="button solo" :class="{ checked: track.solo }" @click="toggleSolo(track.index)">Solo</button>
              <button type="button" class="button mute" :class="{ checked: track.mute }" @click="toggleMute(track.index)">Mute</button>
            </span>
          </li>
        </ul>
      </span>
    </div>
    <div id="alphaTab" ref="alphaTabElement"></div>
  </div>
</template>

<script>
import { AlphaTabApi } from '@coderline/alphatab';

export default {
  name: 'App',
  data() {
    return {
      api: null,
      tracks: [],
      metronomeEnabled: false,
      playbackSpeed: 1,
      file: new URLSearchParams(window.location.search).get('file')
    };
  },
  mounted() {
    this.initAlphaTab();
  },
  methods: {
    initAlphaTab() {
      const element = this.$refs.alphaTabElement;
      this.api = new AlphaTabApi(element, {
        file: this.file,
        player: '/apps/guitartabplayer/3rdparty/alphaSynth/default.sf2',
        tracks: [0]
      });

      this.api.scoreLoaded.on((score) => {
        this.tracks = score.tracks.map(track => ({
          index: track.index,
          name: track.name,
          volume: track.playbackInfo.volume,
          solo: false,
          mute: false
        }));
      });
    },
    playPause() {
      this.api.playPause();
    },
    stop() {
      this.api.stop();
    },
    toggleMetronome() {
      this.metronomeEnabled = !this.metronomeEnabled;
      this.api.metronomeVolume = this.metronomeEnabled ? 1 : 0;
    },
    changeSpeed(event) {
      this.api.playbackSpeed = parseFloat(event.target.value);
    },
    selectTrack(trackIndex) {
      this.api.tracks = [trackIndex];
    },
    changeVolume(trackIndex, event) {
      this.api.changeTrackVolume(trackIndex, parseInt(event.target.value));
    },
    toggleSolo(trackIndex) {
      const track = this.tracks.find(t => t.index === trackIndex);
      track.solo = !track.solo;
      this.api.changeTrackSolo(trackIndex, track.solo);
    },
    toggleMute(trackIndex) {
      const track = this.tracks.find(t => t.index === trackIndex);
      track.mute = !track.mute;
      this.api.changeTrackMute(trackIndex, track.mute);
    }
  }
};
</script>

<style scoped>
/* Include existing styles */
@import '../css/style.css';
@import '../css/webguide.css';
</style>