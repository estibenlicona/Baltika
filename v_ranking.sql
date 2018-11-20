SELECT
templ.tl id_team,
(templ.pl+tempv.pv) partidos,
(templ.pjl+tempv.pjv) partidos_jugados,
(templ.gfl+tempv.gfv) gol_favor,
(templ.gcl+tempv.gcv) gol_contra,
(templ.pgl+tempv.pgv) partidos_ganados,
(templ.pel+tempv.pev) partidos_empatados,
(templ.ppl+tempv.ppv) partidos_perdidos,
(templ.ptsl+tempv.ptsv) puntos
FROM
(
SELECT t.id tl, COUNT(g.home) pl, SUM(g.played) pjl, SUM(g.g_home) gfl, SUM(g.g_away) gcl,
SUM(CASE WHEN g.g_home > g.g_away THEN 1 ELSE 0 END) as pgl,
SUM(CASE WHEN g.g_away = g.g_home THEN 1 ELSE 0 END) as pel,
SUM(CASE WHEN g.g_home < g.g_away THEN 1 ELSE 0 END) as ppl,
SUM(CASE WHEN g.g_home > g.g_away THEN 3 ELSE 0 END) as ptsl
FROM games g INNER JOIN teams t ON t.id = g.home
WHERE g.league = 1
GROUP BY t.id
) as templ,
(
SELECT t.id tv, COUNT(g.away) pv, SUM(g.played) pjv, SUM(g.g_away) gfv, SUM(g.g_home) gcv,
SUM(CASE WHEN g.g_away > g.g_home THEN 1 ELSE 0 END) as pgv,
SUM(CASE WHEN g.g_home = g.g_away THEN 1 ELSE 0 END) as pev,
SUM(CASE WHEN g.g_away < g.g_home THEN 1 ELSE 0 END) as ppv,
SUM(CASE WHEN g.g_away > g.g_home THEN 3 ELSE 0 END) as ptsv
FROM games g INNER JOIN teams t ON t.id = g.away
WHERE g.league = 1
GROUP BY t.id
) as tempv
WHERE tempv.tv = templ.tl
