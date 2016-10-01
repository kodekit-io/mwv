<?php

namespace App;


class ProjectFaker
{
    public function fakeProjects()
    {
        return '{
          "status": "OK",
          "code": 200,
          "user": {
            "userId": "350",
            "userName": "risetIndofood"
          },
          "projectList": [
            {
              "pid": "2253502522013",
              "pname": "susu"
            },
            {
              "pid": "111561522016",
              "pname": "Campaign Chitato"
            },
            {
              "pid": "133641222016",
              "pname": "Campaign Indomilk"
            },
            {
              "pid": "1411102712016",
              "pname": "Chitato Indomie Goreng"
            },
            {
              "pid": "231152522013",
              "pname": "General Indofood1"
            },
            {
              "pid": "232532522013",
              "pname": "General Indofood2"
            },
            {
              "pid": "142421942013",
              "pname": "general Indofood3"
            },
            {
              "pid": "125859762016",
              "pname": "hashtag CurhatIchiOcha"
            },
            {
              "pid": "13416492014",
              "pname": "Journal Nutrition"
            },
            {
              "pid": "1394314102014",
              "pname": "Kopi Cafela"
            },
            {
              "pid": "2245362522013",
              "pname": "Mie"
            },
            {
              "pid": "103951832013",
              "pname": "mie competitor"
            },
            {
              "pid": "1133462522015",
              "pname": "Mie Instan di TV One"
            },
            {
              "pid": "133142782014",
              "pname": "Mie Instant"
            }
          ]
        }';
    }

    public function fakeProjectInfo()
    {
        return '{
            "status": "OK",
            "code": 200,
            "project": {
                "pid": "1841342492016",
                "pname": "Pilkada Kabupaten Bekasi"
            },
            "projectInfo": {
                "keywordList": [
                    {
                        "keyword": {
                            "keywordId": "1",
                            "keywordName": "Sa\'duddin AND Ahmad Dhani"
                        },
                        "color": "#E48701"
                    },
                    {
                        "keyword": {
                            "keywordId": "2",
                            "keywordName": "Banjir OR Macet"
                        },
                        "color": "#E48701"
                    }
                ],
                "topicList": [
                    {
                        "topicId": "1",
                        "topicName": " Banjir OR Macet"
                    },
                    {
                        "topicId": "2",
                        "topicName": " Buruh AND PHK"
                    }
                ],
                "noiseKeywordList": [
                    {
                        "noiseKeyId": "1",
                        "noiseKeyName": " Republik Cinta"
                    },
                    {
                        "noiseKeyId": "2",
                        "noiseKeyName": "Dewa 19"
                    }
                ],
                "positiveList": [],
                "negativeList": []
            }
        }';
    }

    public function fakeProjectWithInfo()
    {
        return '{
                    "status": "OK",
                    "code": 200,
                    "user": {
                        "userId": "551",
                        "userName": "nanang"
                    },
                    "dataProjectList": [
                        {
                            "project": {
                                "pid": "1715362982016",
                                "pname": "Gubernur DKI"
                            },
                            "projectInfo": {
                                "keywordList": [
                                    {
                                        "keyword": {
                                            "keywordId": "1",
                                            "keywordName": "Ahok"
                                        },
                                        "color": "#E48701"
                                    },
                                    {
                                        "keyword": {
                                            "keywordId": "2",
                                            "keywordName": "Ridwan Kamil"
                                        },
                                        "color": "#A5BC4E"
                                    },
                                    {
                                        "keyword": {
                                            "keywordId": "3",
                                            "keywordName": "Risma"
                                        },
                                        "color": "#1B95D9"
                                    }
                                ],
                                "positiveList": [
                                ],
                                "negativeList": [
                                ]
                            }
                        },
                        {
                            "project": {
                                "pid": "1431242592016",
                                "pname": "New Pilgub DKI 2017"
                            },
                            "projectInfo": {
                                "keywordList": [
                                    {
                                        "keyword": {
                                            "keywordId": "1",
                                            "keywordName": " Ahok - Djarot OR Basuki Tjahaja Purnama - Djarot Saiful Hidayat"
                                        },
                                        "color": "#E48701"
                                    },
                                    {
                                        "keyword": {
                                            "keywordId": "2",
                                            "keywordName": " Agus - Sylviana OR Agus Harimurti - Sylviana Murni"
                                        },
                                        "color": "#A5BC4E"
                                    },
                                    {
                                        "keyword": {
                                            "keywordId": "3",
                                            "keywordName": " Anies - Sandiaga OR Anies Baswedan - Sandiaga Uno OR Anies - SandiUno"
                                        },
                                        "color": "#1B95D9"
                                    }
                                ],
                                "positiveList": [
                                ],
                                "negativeList": [
                                ]
                            }
                        },
                        {
                            "project": {
                                "pid": "1841342492016",
                                "pname": "Pilkada Kabupaten Bekasi"
                            },
                            "projectInfo": {
                                "keywordList": [
                                    {
                                        "keyword": {
                                            "keywordId": "1",
                                            "keywordName": " Sa\'duddin AND Ahmad Dhani"
                                        },
                                        "color": "#E48701"
                                    },
                {
                "keyword": {
                "keywordId": "2",
                "keywordName": "PKS AND Gerindra"
                },
                "color": "#A5BC4E"
                                    },
                                    {
                                        "keyword": {
                                        "keywordId": "3",
                                            "keywordName": "Neneng"
                                        },
                                        "color": "#1B95D9"
                                    },
                                    {
                                        "keyword": {
                                        "keywordId": "4",
                                            "keywordName": "Sri"
                                        },
                                        "color": "#CACA9E"
                                    }
                                ],
                                "positiveList": [
                ],
                                "negativeList": [
                ]
                            }
                        }
                    ]
                }';
    }
}