particlesJS('particles-js', {
    "particles": {
      "number": {
        "value": 120, // パーティクルの数
        "density": {
          "enable": true, // 密度を有効にするかどうか
          "value_area": 800 // 密度の計算範囲（面積）
        }
      },
      "color": {
        "value": "#ffffff" // パーティクルの色
      },
      "shape": {
        "type": "circle", // パーティクルの形（circle, edge, triangle, polygon, star, image など）
        "stroke": {
          "width": 0, // パーティクルの輪郭の幅
          "color": "#000000" // パーティクルの輪郭の色
        },
        "polygon": {
          "nb_sides": 5 // ポリゴン形状のパーティクルの場合の辺の数
        },
        "image": {
          "src": "img/github.svg", // 画像形状のパーティクルの場合のソース
          "width": 100, // 画像の幅
          "height": 100 // 画像の高さ
        }
      },
      "opacity": {
        "value": 0.5, // パーティクルの不透明度
        "random": false, // 不透明度をランダムにするかどうか
        "anim": {
          "enable": false, // 不透明度のアニメーションを有効にするかどうか
          "speed": 1, // 不透明度のアニメーションの速度
          "opacity_min": 0.1, // 不透明度の最小値
          "sync": false // アニメーションを全パーティクルで同期させるかどうか
        }
      },
      "size": {
        "value": 3, // パーティクルのサイズ
        "random": true, // サイズをランダムにするかどうか
        "anim": {
          "enable": false, // サイズのアニメーションを有効にするかどうか
          "speed": 40, // サイズのアニメーションの速度
          "size_min": 0.1, // サイズの最小値
          "sync": false // アニメーションを全パーティクルで同期させるかどうか
        }
      },
      "line_linked": {
        "enable": true, // パーティクル同士を線で繋ぐかどうか
        "distance": 150, // パーティクル同士を繋ぐ線の距離
        "color": "#ffffff", // 線の色
        "opacity": 0.4, // 線の不透明度
        "width": 1 // 線の幅
      },
      "move": {
        "enable": true, // パーティクルの移動を有効にするかどうか
        "speed": 3, // パーティクルの移動速度
        "direction": "none", // パーティクルの移動方向（none, top, top-right, right, bottom-right, bottom, bottom-left, left, top-left）
        "random": false, // 移動方向をランダムにするかどうか
        "straight": false, // パーティクルが直線的に移動するかどうか
        "out_mode": "out", // キャンバスの外に出たときの挙動（out, bounce）
        "bounce": false, // パーティクルがキャンバスの端でバウンドするかどうか
        "attract": {
          "enable": false, // パーティクル同士が引き合うかどうか
          "rotateX": 600, // 引き合う強さのX軸方向の回転量
          "rotateY": 1200 // 引き合う強さのY軸方向の回転量
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas", // インタラクションを検知する対象（canvas, window）
      "events": {
        "onhover": {
          "enable": false, // マウスホバー時のインタラクションを有効にするかどうか
          "mode": "repulse" // マウスホバー時のモード（grab, bubble, repulse など）
        },
        "onclick": {
          "enable": true, // マウスクリック時のインタラクションを有効にするかどうか
          "mode": "push" // マウスクリック時のモード（push, remove, bubble, repulse など）
        },
        "resize": true // キャンバスのリサイズ時にパーティクルを再配置するかどうか
      },
      "modes": {
        "grab": {
          "distance": 400, // grabモードでの距離
          "line_linked": {
            "opacity": 1 // grabモードでの線の不透明度
          }
        },
        "bubble": {
          "distance": 400, // bubbleモードでの距離
          "size": 40, // bubbleモードでのサイズ
          "duration": 2, // bubbleモードでの持続時間
          "opacity": 8, // bubbleモードでの不透明度
          "speed": 3 // bubbleモードでの速度
        },
        "repulse": {
          "distance": 200, // repulseモードでの距離
          "duration": 0.4 // repulseモードでの持続時間
        },
        "push": {
          "particles_nb": 4 // pushモードで追加されるパーティクルの数
        },
        "remove": {
          "particles_nb": 2 // removeモードで削除されるパーティクルの数
        }
      }
    },
    "retina_detect": true // レティナディスプレイでの検出を有効にするかどうか
  });