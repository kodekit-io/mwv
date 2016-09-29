<?php

namespace App;


class ChartFaker
{

    public function fakeChart($widgetId)
    {
        // wordcloud
        if ($widgetId == 7) {
            return $this->wordCloud();
        } else if ($widgetId == 'E') {
            return $this->viewInfluencer();
        } else {
            return '{
                  "status": "OK",
                  "code": 200,
                  "widgetID": "1,2,3,4,5,6,9,10,11,12,13,A,B",
                  "startDate": "2016-08-21 00:00:00",
                  "endDate": "2016-09-04 23:59:59",
                  "mediaID": "1,2,3,4,5,6,9",
                  "brandID": "1,2,3,4,5",
                  "topicID": "",
                  "sentiment": "1,0-1",
                  "icapt": "",
                  "text": "",
                  "project": {
                    "pid": "2253502522013",
                    "pname": "susu"
                  },
                  "brandEquity": [
                    {
                      "keywordID": "1",
                      "keywordName": "Indomilk",
                      "color": "#E48701",
                      "buzz": 415,
                      "netsen": 411,
                      "sim": 0.11,
                      "emss": 17.87,
                      "netBrandReputation": 98.85,
                      "brandFavourableTalkability": 99.04,
                      "earnedMediaShare": 10.24,
                      "unquser": 304
                    },
                    {
                      "keywordID": "2",
                      "keywordName": "mymilk_id",
                      "color": "#A5BC4E",
                      "buzz": 353,
                      "netsen": 317,
                      "sim": 0.08,
                      "emss": 4.89,
                      "netBrandReputation": 83.41,
                      "brandFavourableTalkability": 89.8,
                      "earnedMediaShare": 8.71,
                      "unquser": 277
                    },
                    {
                      "keywordID": "3",
                      "keywordName": "frisian flag",
                      "color": "#1B95D9",
                      "buzz": 1089,
                      "netsen": 1043,
                      "sim": 0.28,
                      "emss": 39.65,
                      "netBrandReputation": 92.53,
                      "brandFavourableTalkability": 95.78,
                      "earnedMediaShare": 26.88,
                      "unquser": 938
                    }
                  ],
                  "shareOfVoice": [
                    {
                      "keywordID": "1",
                      "keywordName": "Indomilk",
                      "color": "#E48701",
                      "buzz": 345,
                      "percentage": 14.98,
                      "variance": -0.14
                    },
                    {
                      "keywordID": "2",
                      "keywordName": "mymilk_id",
                      "color": "#A5BC4E",
                      "buzz": 199,
                      "percentage": 8.64,
                      "variance": -0.54
                    },
                    {
                      "keywordID": "3",
                      "keywordName": "frisian flag",
                      "color": "#1B95D9",
                      "buzz": 593,
                      "percentage": 25.75,
                      "variance": -0.1
                    },
                    {
                      "keywordID": "4",
                      "keywordName": "DancowCenter",
                      "color": "#CACA9E",
                      "buzz": 880,
                      "percentage": 38.21,
                      "variance": -0.26
                    },
                    {
                      "keywordID": "5",
                      "keywordName": "milo",
                      "color": "#49AAE0",
                      "buzz": 286,
                      "percentage": 12.42,
                      "variance": -0.23
                    }
                  ],
                  "volumeTrending": [
                    {
                      "keywordID": "1",
                      "keywordName": "Indomilk",
                      "color": "#E48701",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03",
                        "2016-09-04"
                      ],
                      "buzz": [
                        43,
                        25,
                        46,
                        41,
                        47,
                        31,
                        19,
                        22,
                        18,
                        43,
                        8,
                        2,
                        0,
                        0,
                        0
                      ]
                    },
                    {
                      "keywordID": "2",
                      "keywordName": "mymilk_id",
                      "color": "#A5BC4E",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03",
                        "2016-09-04"
                      ],
                      "buzz": [
                        21,
                        13,
                        25,
                        19,
                        18,
                        8,
                        8,
                        10,
                        33,
                        18,
                        16,
                        9,
                        0,
                        0,
                        1
                      ]
                    },
                    {
                      "keywordID": "3",
                      "keywordName": "frisian flag",
                      "color": "#1B95D9",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03",
                        "2016-09-04"
                      ],
                      "buzz": [
                        32,
                        33,
                        195,
                        68,
                        38,
                        35,
                        13,
                        48,
                        45,
                        36,
                        34,
                        8,
                        6,
                        2,
                        0
                      ]
                    },
                    {
                      "keywordID": "4",
                      "keywordName": "DancowCenter",
                      "color": "#CACA9E",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03",
                        "2016-09-04"
                      ],
                      "buzz": [
                        70,
                        63,
                        84,
                        52,
                        48,
                        71,
                        193,
                        26,
                        19,
                        197,
                        36,
                        12,
                        7,
                        2,
                        0
                      ]
                    },
                    {
                      "keywordID": "5",
                      "keywordName": "milo",
                      "color": "#49AAE0",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03",
                        "2016-09-04"
                      ],
                      "buzz": [
                        21,
                        25,
                        22,
                        19,
                        18,
                        15,
                        13,
                        25,
                        18,
                        31,
                        41,
                        35,
                        3,
                        0,
                        0
                      ]
                    }
                  ],
                  "mediaDistribution": [
                    {
                      "mediaID": "1",
                      "mediaName": "Facebook",
                      "buzz": 954,
                      "percentage": 41.42
                    },
                    {
                      "mediaID": "2",
                      "mediaName": "Twitter",
                      "buzz": 1348,
                      "percentage": 58.53
                    },
                    {
                      "mediaID": "5",
                      "mediaName": "Video",
                      "buzz": 1,
                      "percentage": 0.04
                    }
                  ],
                  "sentimentMediaDistribution": [
                    {
                      "mediaID": "1",
                      "mediaName": "Facebook",
                      "positive": {
                        "buzz": 400,
                        "percentage": 40
                      },
                      "neutral": {
                        "buzz": 300,
                        "percentage": 30
                      },
                      "negative": {
                        "buzz": 300,
                        "percentage": 30
                      }
                    },
                    {
                      "mediaID": "2",
                      "mediaName": "Twitter",
                      "positive": {
                        "buzz": 450,
                        "percentage": 45
                      },
                      "neutral": {
                        "buzz": 370,
                        "percentage": 37
                      },
                      "negative": {
                        "buzz": 180,
                        "percentage": 18
                      }
                    },
                    {
                    "mediaID": "3",
                      "mediaName": "Blog",
                      "positive": {
                        "buzz": 400,
                        "percentage": 40
                      },
                      "neutral": {
                        "buzz": 300,
                        "percentage": 30
                      },
                      "negative": {
                        "buzz": 300,
                        "percentage": 30
                      }
                    },
                    {
                      "mediaID": "5",
                      "mediaName": "Video",
                      "positive": {
                        "buzz": 200,
                        "percentage": 20
                      },
                      "neutral": {
                        "buzz": 600,
                        "percentage": 60
                      },
                      "negative": {
                        "buzz": 200,
                        "percentage": 20
                      }
                    }
                  ],
                  "topicDistributions": [],
                  "brandPerMediaDistribution": [
                    {
                      "mediaID": "1",
                      "mediaName": "Facebook",
                      "buzz": 954,
                      "percentage": 41.42,
                      "data": [
                        {
                          "keywordID": "1",
                          "keywordName": "Indomilk",
                          "buzz": 214,
                          "percentage": 22.43
                        },
                        {
                          "keywordID": "2",
                          "keywordName": "mymilk_id",
                          "buzz": 103,
                          "percentage": 10.8
                        },
                        {
                          "keywordID": "3",
                          "keywordName": "frisian flag",
                          "buzz": 243,
                          "percentage": 25.47
                        },
                        {
                          "keywordID": "4",
                          "keywordName": "DancowCenter",
                          "buzz": 370,
                          "percentage": 38.78
                        },
                        {
                          "keywordID": "5",
                          "keywordName": "milo",
                          "buzz": 24,
                          "percentage": 2.52
                        }
                      ]
                    },
                    {
                      "mediaID": "2",
                      "mediaName": "Twitter",
                      "buzz": 1348,
                      "percentage": 58.53,
                      "data": [
                        {
                          "keywordID": "1",
                          "keywordName": "Indomilk",
                          "buzz": 130,
                          "percentage": 9.64
                        },
                        {
                          "keywordID": "2",
                          "keywordName": "mymilk_id",
                          "buzz": 96,
                          "percentage": 7.12
                        },
                        {
                          "keywordID": "3",
                          "keywordName": "frisian flag",
                          "buzz": 350,
                          "percentage": 25.96
                        },
                        {
                          "keywordID": "4",
                          "keywordName": "DancowCenter",
                          "buzz": 510,
                          "percentage": 37.83
                        },
                        {
                          "keywordID": "5",
                          "keywordName": "milo",
                          "buzz": 262,
                          "percentage": 19.44
                        }
                      ]
                    },
                    {
                      "mediaID": "5",
                      "mediaName": "Video",
                      "buzz": 1,
                      "percentage": 0.04,
                      "data": [
                        {
                          "keywordID": "1",
                          "keywordName": "Indomilk",
                          "buzz": 1,
                          "percentage": 100
                        },
                        {
                          "keywordID": "2",
                          "keywordName": "mymilk_id",
                          "buzz": 0,
                          "percentage": 0
                        },
                        {
                          "keywordID": "3",
                          "keywordName": "frisian flag",
                          "buzz": 0,
                          "percentage": 0
                        },
                        {
                          "keywordID": "4",
                          "keywordName": "DancowCenter",
                          "buzz": 0,
                          "percentage": 0
                        },
                        {
                          "keywordID": "5",
                          "keywordName": "milo",
                          "buzz": 0,
                          "percentage": 0
                        }
                      ]
                    }
                  ],
                  "mediaPerBrandDistribution": [
                    {
                      "keywordID": "1",
                      "keywordName": "Indomilk",
                      "buzz": 345,
                      "percentage": 14.98,
                      "data": [
                        {
                          "mediaID": "1",
                          "mediaName": "Facebook",
                          "buzz": 214,
                          "percentage": 62.03
                        },
                        {
                          "mediaID": "2",
                          "mediaName": "Twitter",
                          "buzz": 130,
                          "percentage": 37.68
                        },
                        {
                          "mediaID": "5",
                          "mediaName": "Video",
                          "buzz": 1,
                          "percentage": 0.29
                        }
                      ]
                    },
                    {
                      "keywordID": "2",
                      "keywordName": "mymilk_id",
                      "buzz": 199,
                      "percentage": 8.64,
                      "data": [
                        {
                          "mediaID": "1",
                          "mediaName": "Facebook",
                          "buzz": 103,
                          "percentage": 51.76
                        },
                        {
                          "mediaID": "2",
                          "mediaName": "Twitter",
                          "buzz": 96,
                          "percentage": 48.24
                        },
                        {
                          "mediaID": "5",
                          "mediaName": "Video",
                          "buzz": 0,
                          "percentage": 0
                        }
                      ]
                    },
                    {
                      "keywordID": "3",
                      "keywordName": "frisian flag",
                      "buzz": 593,
                      "percentage": 25.75,
                      "data": [
                        {
                          "mediaID": "1",
                          "mediaName": "Facebook",
                          "buzz": 243,
                          "percentage": 40.98
                        },
                        {
                          "mediaID": "2",
                          "mediaName": "Twitter",
                          "buzz": 350,
                          "percentage": 59.02
                        },
                        {
                          "mediaID": "5",
                          "mediaName": "Video",
                          "buzz": 0,
                          "percentage": 0
                        }
                      ]
                    },
                    {
                      "keywordID": "4",
                      "keywordName": "DancowCenter",
                      "buzz": 880,
                      "percentage": 38.21,
                      "data": [
                        {
                          "mediaID": "1",
                          "mediaName": "Facebook",
                          "buzz": 370,
                          "percentage": 42.05
                        },
                        {
                          "mediaID": "2",
                          "mediaName": "Twitter",
                          "buzz": 510,
                          "percentage": 57.95
                        },
                        {
                          "mediaID": "5",
                          "mediaName": "Video",
                          "buzz": 0,
                          "percentage": 0
                        }
                      ]
                    },
                    {
                      "keywordID": "5",
                      "keywordName": "milo",
                      "buzz": 286,
                      "percentage": 12.42,
                      "data": [
                        {
                          "mediaID": "1",
                          "mediaName": "Facebook",
                          "buzz": 24,
                          "percentage": 8.39
                        },
                        {
                          "mediaID": "2",
                          "mediaName": "Twitter",
                          "buzz": 262,
                          "percentage": 91.61
                        },
                        {
                          "mediaID": "5",
                          "mediaName": "Video",
                          "buzz": 0,
                          "percentage": 0
                        }
                      ]
                    }
                  ],
                  "brandPerTopicDistribution": [],
                  "sentimentBrandDistributions": [
                    {
                      "keywordID": "1",
                      "keywordName": "Indomilk",
                      "positive": {
                        "buzz": 345,
                        "percentage": 100
                      },
                      "neutral": {
                        "buzz": 0,
                        "percentage": 0
                      },
                      "negative": {
                        "buzz": 0,
                        "percentage": 0
                      }
                    },
                    {
                      "keywordID": "2",
                      "keywordName": "mymilk_id",
                      "positive": {
                        "buzz": 199,
                        "percentage": 100
                      },
                      "neutral": {
                        "buzz": 0,
                        "percentage": 0
                      },
                      "negative": {
                        "buzz": 0,
                        "percentage": 0
                      }
                    },
                    {
                      "keywordID": "3",
                      "keywordName": "frisian flag",
                      "positive": {
                        "buzz": 593,
                        "percentage": 100
                      },
                      "neutral": {
                        "buzz": 0,
                        "percentage": 0
                      },
                      "negative": {
                        "buzz": 0,
                        "percentage": 0
                      }
                    },
                    {
                      "keywordID": "4",
                      "keywordName": "DancowCenter",
                      "positive": {
                        "buzz": 880,
                        "percentage": 100
                      },
                      "neutral": {
                        "buzz": 0,
                        "percentage": 0
                      },
                      "negative": {
                        "buzz": 0,
                        "percentage": 0
                      }
                    },
                    {
                      "keywordID": "5",
                      "keywordName": "milo",
                      "positive": {
                        "buzz": 286,
                        "percentage": 100
                      },
                      "neutral": {
                        "buzz": 0,
                        "percentage": 0
                      },
                      "negative": {
                        "buzz": 0,
                        "percentage": 0
                      }
                    }
                  ],
                  "sentimentPerTopicDistributions": [],
                  "viewTrend": [
                    {
                      "keywordID": "1",
                      "keywordName": "Indomilk",
                      "color": "#E48701",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01"
                      ],
                      "buzz": [
                        43,
                        25,
                        46,
                        41,
                        47,
                        31,
                        19,
                        22,
                        18,
                        43,
                        8,
                        2
                      ]
                    },
                    {
                      "keywordID": "2",
                      "keywordName": "mymilk_id",
                      "color": "#A5BC4E",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-04"
                      ],
                      "buzz": [
                        21,
                        13,
                        25,
                        19,
                        18,
                        8,
                        8,
                        10,
                        33,
                        18,
                        16,
                        9,
                        1
                      ]
                    },
                    {
                      "keywordID": "3",
                      "keywordName": "frisian flag",
                      "color": "#1B95D9",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03"
                      ],
                      "buzz": [
                        32,
                        33,
                        195,
                        68,
                        38,
                        35,
                        13,
                        48,
                        45,
                        36,
                        34,
                        8,
                        6,
                        2
                      ]
                    },
                    {
                      "keywordID": "4",
                      "keywordName": "DancowCenter",
                      "color": "#CACA9E",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03"
                      ],
                      "buzz": [
                        70,
                        63,
                        84,
                        52,
                        48,
                        71,
                        193,
                        26,
                        19,
                        197,
                        36,
                        12,
                        7,
                        2
                      ]
                    },
                    {
                      "keywordID": "5",
                      "keywordName": "milo",
                      "color": "#49AAE0",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02"
                      ],
                      "buzz": [
                        21,
                        25,
                        22,
                        19,
                        18,
                        15,
                        13,
                        25,
                        18,
                        31,
                        41,
                        35,
                        3
                      ]
                    }
                  ],
                  "viewSentimentTrend": [
                    {
                      "sentimentID": "1",
                      "sentimentName": "Positive",
                      "date": [
                        "2016-08-21",
                        "2016-08-22",
                        "2016-08-23",
                        "2016-08-24",
                        "2016-08-25",
                        "2016-08-26",
                        "2016-08-27",
                        "2016-08-28",
                        "2016-08-29",
                        "2016-08-30",
                        "2016-08-31",
                        "2016-09-01",
                        "2016-09-02",
                        "2016-09-03",
                        "2016-09-04"
                      ],
                      "buzz": [
                        187,
                        159,
                        372,
                        199,
                        169,
                        160,
                        246,
                        131,
                        133,
                        325,
                        135,
                        66,
                        16,
                        4,
                        1
                      ]
                    }
                  ],
                  "keywordName": [
                    "Indomilk",
                    "mymilk_id",
                    "frisian flag",
                    "DancowCenter",
                    "milo"
                  ],
                  "keywordNames": null
                }';
        }

    }

    private function wordCloud()
    {
        return '{
              "status": "OK",
              "code": 200,
              "startDate": "2016-08-01 00:00:00",
              "endDate": "2016-08-31 23:59:59",
              "mediaID": "1,2,3,4,5,6,9,10",
              "brandID": "",
              "topicID": "",
              "sentiment": "1,0,-1",
              "icapt": "",
              "text": "",
              "project": {
                "pid": "95981932013",
                "pname": "susu2"
              },
              "dataUnion": [
                {
                  "tag": "susu",
                  "buzz": 1200,
                  "link": "text=susu",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "minum",
                  "buzz": 800,
                  "link": "text=minum",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "milo",
                  "buzz": 50,
                  "link": "text=milo",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "indomilk",
                  "buzz": 300,
                  "link": "text=indomilk",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "harga",
                  "buzz": 10,
                  "link": "text=harga",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "milku",
                  "buzz": 250,
                  "link": "text=milku",
                  "color": "#E48701"
                },
                {
                  "tag": "sobat",
                  "buzz": 100,
                  "link": "text=sobat",
                  "color": "#E48701"
                },
                {
                  "tag": "ultra",
                  "buzz": 340,
                  "link": "text=ultra",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "milkupolis",
                  "buzz": 91,
                  "link": "text=milkupolis",
                  "color": "#E48701"
                },
                {
                  "tag": "hadiah",
                  "buzz": 83,
                  "link": "text=hadiah",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "dancow",
                  "buzz": 80,
                  "link": "text=dancow",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "gold",
                  "buzz": 77,
                  "link": "text=gold",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "sachet",
                  "buzz": 71,
                  "link": "text=sachet",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "bendera",
                  "buzz": 70,
                  "link": "text=bendera",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "minyak",
                  "buzz": 66,
                  "link": "text=minyak",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "kotak",
                  "buzz": 61,
                  "link": "text=kotak",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "pembelian",
                  "buzz": 61,
                  "link": "text=pembelian",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "goreng",
                  "buzz": 61,
                  "link": "text=goreng",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "mulai",
                  "buzz": 59,
                  "link": "text=mulai",
                  "color": "#A5BC4E"
                },
                {
                  "tag": "promo",
                  "buzz": 56,
                  "link": "text=promo",
                  "color": "#A5BC4E"
                }
              ]
            }';
    }

    private function viewInfluencer()
    {
        return '{
              "status": "OK",
              "code": 200,
              "widgetID": "E",
              "startDate": "2016-08-01 00:00:00",
              "endDate": "2016-09-04 23:59:59",
              "mediaID": "1",
              "brandID": "1,2,3,4,5",
              "topicID": "",
              "sentiment": "1,0-1",
              "icapt": "",
              "text": "",
              "project": {
                "pid": "2253502522013",
                "pname": "susu"
              },
              "influencer": {
                "top10LikeStatus": {
                  "groupName": "Top 10 Like (by Status)",
                  "scoreTotal": 36,
                  "data": [
                    {
                      "name": "Tabloid Nakita (1 post)",
                      "score": 11,
                      "value": 30.56,
                      "link": "user=151954181525822",
                      "url": "http://www.facebook.com/#!/profile.php?id=151954181525822"
                    },
                    {
                      "name": "Tabloid Nakita (1 post)",
                      "score": 9,
                      "value": 25,
                      "link": "user=151954181525822",
                      "url": "http://www.facebook.com/#!/profile.php?id=151954181525822"
                    },
                    {
                      "name": "Tabloid Nakita (2 post)",
                      "score": 5,
                      "value": 13.89,
                      "link": "user=151954181525822",
                      "url": "http://www.facebook.com/#!/profile.php?id=151954181525822"
                    },
                    {
                      "name": "Septa Ria Chaidir (1 post)",
                      "score": 2,
                      "value": 5.56,
                      "link": "user=498162013672089",
                      "url": "http://www.facebook.com/#!/profile.php?id=498162013672089"
                    },
                    {
                      "name": "Mazaya Sina (1 post)",
                      "score": 2,
                      "value": 5.56,
                      "link": "user=1710244449265266",
                      "url": "http://www.facebook.com/#!/profile.php?id=1710244449265266"
                    },
                    {
                      "name": "Novia Omara (1 post)",
                      "score": 2,
                      "value": 5.56,
                      "link": "user=1228654293831603",
                      "url": "http://www.facebook.com/#!/profile.php?id=1228654293831603"
                    },
                    {
                      "name": "Intan Febriani Tayang (1 post)",
                      "score": 2,
                      "value": 5.56,
                      "link": "user=488779717998267",
                      "url": "http://www.facebook.com/#!/profile.php?id=488779717998267"
                    },
                    {
                      "name": "Corry Surjawan (2 post)",
                      "score": 1,
                      "value": 2.78,
                      "link": "user=10204871576148190",
                      "url": "http://www.facebook.com/#!/profile.php?id=10204871576148190"
                    },
                    {
                      "name": "Yani Thamrin (1 post)",
                      "score": 1,
                      "value": 2.78,
                      "link": "user=130203027420212",
                      "url": "http://www.facebook.com/#!/profile.php?id=130203027420212"
                    },
                    {
                      "name": "Hartono Tono (1 post)",
                      "score": 1,
                      "value": 2.78,
                      "link": "user=316758748669478",
                      "url": "http://www.facebook.com/#!/profile.php?id=316758748669478"
                    }
                  ]
                },
                "top10LikePhoto": {
                  "groupName": "Top 10 Like (by Photo)",
                  "scoreTotal": 0,
                  "data": []
                },
                "top10LikeLink": {
                  "groupName": "Top 10 Like (by Link)",
                  "scoreTotal": 0,
                  "data": []
                },
                "top10LikeVideo": {
                  "groupName": "Top 10 Like (by Video)",
                  "scoreTotal": 0,
                  "data": []
                }
              }
            }';
    }
}